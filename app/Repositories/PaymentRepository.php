<?php

namespace App\Repositories;

use App\User;
use App\Competition;
use App\Entry;
use App\Payment;

class PaymentRepository {

    public function amountOwing(User $user, Competition $competition) {
        $entries = Entry::where([
            'user_id' => $user->id,
            'competition_id' => $competition->id
        ])->count();

        $paid = $this->amountPaid($user, $competition);
        // TODO: This is a hack for ALES. Need a more flexible cost structure
        return ($entries * $competition->cost_per_entry) + 1 - $paid;
    }

    public function amountPaid(User $user, Competition $competition) {
        return Payment::where([
            'user_id' => $user->id,
            'competition_id' =>$competition->id
        ])->sum('amount');
    }
}
