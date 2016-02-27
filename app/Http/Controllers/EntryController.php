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
    protected $paypalApiContext;

    public function __construct(
            EntryRepository $entries,
            CompetitionRepository $comps,
            StyleRepository $styles) {
        $this->middleware('auth');

        $this->entries = $entries;
        $this->competitions = $comps;
        $this->styles = $styles;

        $this->paypalApiContext = new ApiContext(new OAuthTokenCredential(config('paypal.client_id'), config('paypal.secret')));
        $this->paypalApiContext->setConfig(config('paypal.settings'));
    }

    public function index(Request $request) {
        $comp_id = $request->session()->get('competition', null);
        if ($comp_id == null) {
            $request->session()->flash('error', 'Not sure what competition you are trying to enter');
            return redirect('/dashboard');
        }

        $comp = $this->competitions->get($comp_id);
        $styles = $this->styles->getAllStyles();
        return view('entries.index', [
            'entries' => $this->entries->forUser($request->user(), $comp),
            'competition' => $comp,
            'styles' => $styles
        ]);
    }

    public function create(Request $request) {
        $comp_id = $request->session()->get('competition', null);
        if ($comp_id == null) {
            $request->session()->flash('error', 'Not sure what competition you are trying to enter');
            return redirect('/dashboard');
        }

        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        $request->user()->entries()->create([
            'name' => $request->name,
            'competition_id' => $comp_id,
            'style_id' => $request->style,
            'comments' => $request->comments
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
        $cc_number = $request->cc_number;
        $cc_exp_month = $request->cc_exp_month;
        $cc_exp_year = $request->cc_exp_year;
        $cc_cvv = $request->cc_cvv;
        $cc_first_name = $request->cc_first_name;
        $cc_last_name = $request->cc_last_name;
        $cc_type = $request->cc_type;

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
            $payment->create($this->paypalApiContext);
        } catch (Exception $ex) {
            $request->session->flash('error', 'There was an issue processing your payment.');
            return redirect('/entries');
        }
        $request->session()->flash('success', $payment->getId() . ' - ' . $payment->getState());
        return redirect('/entries');
    }
}
