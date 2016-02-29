<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'transaction_id', 'status', 'amount', 'user_id',
        'competition_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function competition() {
        return $this->belongsTo(Competition::class);
    }
}
