<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $fillable = [
        'name', 'description', 'rules',
        'entry_open', 'entry_close', 'judge_start', 'judge_end',
        'result_at', 'ship_address1', 'ship_address2', 'ship_city',
        'ship_province', 'ship_postal_code', 'contact_email', 'creator'
    ];

    public function admins() {
        return $this->belongsToMany(User::class, 'competitions_admins');
    }

    public function creator() {
        return $this->belongsTo(User::class, 'creator');
    }
}
