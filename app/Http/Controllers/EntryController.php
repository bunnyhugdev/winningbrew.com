<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Entry;
use App\Repositories\EntryRepository;

use App\Competition;
use App\Repositories\CompetitionRepository;

use App\Style;
use App\Repositories\StyleRepository;

use App\User;

use App\Repositories\PaymentRepository;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\CreditCard;
use PayPal\Api\FundingInstrument;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\Payment;


class EntryController extends Controller
{
    protected $competitions;
    protected $entries;
    protected $styles;
    protected $payments;

    public function __construct(
            EntryRepository $entries,
            CompetitionRepository $comps,
            StyleRepository $styles,
            PaymentRepository $payments) {
        $this->middleware('auth');

        $this->entries = $entries;
        $this->competitions = $comps;
        $this->styles = $styles;
        $this->payments = $payments;
    }

    public function index(Request $request) {
        $comp = $this->_getCompetition($request);
        $styles = $this->styles->getAllStyles();
        return view('entries.index', [
            'entries' => $this->entries->forUser($request->user(), $comp),
            'competition' => $comp,
            'styles' => $styles,
            'paid' => $this->payments->amountPaid($request->user(), $comp),
            'owing' => $this->payments->amountOwing($request->user(), $comp),
            'invalidAddress' => $this->_isAddressInvalid($request->user())
        ]);
    }

    public function create(Request $request) {
        $comp = $this->_getCompetition($request);

        $this->validate($request, [
            'name' => 'required|max:255',
            'style' => 'required'
        ]);
        $request->user()->entries()->create([
            'name' => $request->name,
            'competition_id' => $comp->id,
            'style_id' => $request->style,
            'comments' => $request->comments,
            'label' => $this->entries->findUniqueLabel($comp)
        ]);
        return redirect('/entries');
    }

    public function destroy(Request $request, Entry $entry) {
        $this->authorize('destroy', $entry);
        $entry->delete();
        return redirect('/entries');
    }

    public function competition(Request $request, $id) {
        $request->session()->put('competition', $id);
        return redirect('/entries');
    }

    public function payment(Request $request) {
        $comp = $this->_getCompetition($request);
        $this->validate($request, [
            'cc_number' => 'required|numeric',
            'cc_exp_month' => 'required|numeric',
            'cc_exp_year' => 'required|numeric',
            'cc_first_name' => 'required',
            'cc_last_name' => 'required'
        ]);
        $paypalApiContext = new ApiContext(new OAuthTokenCredential(
            $comp->paypal_client_id, $comp->paypal_secret
        ));
        $paypalApiContext->setConfig(config('paypal.settings'));

        $cc_number = $request->cc_number;
        $cc_exp_month = $request->cc_exp_month;
        $cc_exp_year = $request->cc_exp_year;
        $cc_cvv = $request->cc_cvv;
        $cc_first_name = $request->cc_first_name;
        $cc_last_name = $request->cc_last_name;
        $cc_type = $this->_getCreditCardType($cc_number);

        $cc = new CreditCard();
        $cc->setType($cc_type)
            ->setNumber($cc_number)
            ->setExpireMonth($cc_exp_month)
            ->setExpireYear($cc_exp_year)
            ->setCvv2($cc_cvv)
            ->setFirstName($cc_first_name)
            ->setLastName($cc_last_name);

        $fi = new FundingInstrument();
        $fi->setCreditCard($cc);

        $payer = new Payer();
        $payer->setPaymentMethod('credit_card')
            ->setFundingInstruments(array($fi));

        $amount = new Amount();
        $amount->setCurrency("CAD")
            ->setTotal(10);

        $tx = new Transaction();
        $tx->setAmount($amount)
            ->setDescription("Homebrew Competition Entry Fees")
            ->setInvoiceNumber(uniqid());

        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setTransactions(array($tx));

        $req = clone $payment;
        try {
            $payment->create($paypalApiContext);
        } catch (Exception $ex) {
            $request->session->flash('error', 'There was an issue processing your payment.');
            return redirect('/entries');
        }
        $request->session()->flash('success', 'Thanks for your payment of ' . $amount->getTotal());

        $request->user()->payments()->create([
            'competition_id' => $comp_id,
            'status' => $payment->getState(),
            'amount' => $amount->getTotal(),
            'transaction_id' => $payment->getId()
        ]);

        return redirect('/entries');
    }

    protected function _getCreditCardType($str, $format = 'string')
    {
        if (empty($str)) {
            return false;
        }

        $matchingPatterns = [
            'visa' => '/^4[0-9]{12}(?:[0-9]{3})?$/',
            'mastercard' => '/^5[1-5][0-9]{14}$/',
            'amex' => '/^3[47][0-9]{13}$/',
            'discover' => '/^6(?:011|5[0-9]{2})[0-9]{12}$/'
        ];

        $ctr = 1;
        foreach ($matchingPatterns as $key=>$pattern) {
            if (preg_match($pattern, $str)) {
                return $format == 'string' ? $key : $ctr;
            }
            $ctr++;
        }
    }

    protected function _getCompetition(Request $request) {
        $comp_id = $request->session()->get('competition', null);
        if ($comp_id == null) {
            $request->session()->flash('error', 'Not sure what competition you are trying to make payments on');
            return redirect('/');
        }
        return $this->competitions->get($comp_id);
    }

    protected function _isAddressInvalid(User $user) {
        return (strlen($user->address1) === 0) ||
               (strlen($user->city) === 0) ||
               (strlen($user->province) === 0) ||
               (strlen($user->postal_code) === 0);
    }
}
