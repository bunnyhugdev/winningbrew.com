<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $fillable = [
        'name', 'description', 'rules',
        'entry_open', 'entry_close', 'judge_start', 'judge_end',
        'result_at', 'ship_address1', 'ship_address2', 'ship_city',
        'ship_province', 'ship_postal_code', 'contact_email', 'creator',
        'guide_id', 'cost_per_entry', 'paypal_client_id', 'paypal_secret',
        'finalized',
        'first_bos_id', 'second_bos_id', 'third_bos_id',
        'first_mmoy_id', 'second_mmoy_id', 'third_mmoy_id',
        'first_cmoy_id', 'second_cmoy_id', 'third_cmoy_id',
    ];

    public function admins() {
        return $this->belongsToMany(User::class, 'competitions_admins');
    }

    public function creator() {
        return $this->belongsTo(User::class, 'creator');
    }

    public function guide() {
        return $this->belongsTo(Guide::class);
    }

    public function judgingGuide() {
        return $this->belongsTo(JudgingGuide::class);
    }

    public function results() {
        return $this->hasMany(Result::class);
    }

    public function firstBos() {
        return $this->belongsTo(Entry::class, 'first_bos_id');
    }
    public function secondBos() {
        return $this->belongsTo(Entry::class, 'second_bos_id');
    }
    public function thirdBos() {
        return $this->belongsTo(Entry::class, 'third_bos_id');
    }

    public function firstMmoy() {
        return $this->belongsTo(Entry::class, 'first_mmoy_id');
    }
    public function secondMmoy() {
        return $this->belongsTo(Entry::class, 'second_mmoy_id');
    }
    public function thirdMmoy() {
        return $this->belongsTo(Entry::class, 'third_mmoy_id');
    }

    public function firstCmoy() {
        return $this->belongsTo(Entry::class, 'first_cmoy_id');
    }
    public function secondCmoy() {
        return $this->belongsTo(Entry::class, 'second_cmoy_id');
    }
    public function thirdCmoy() {
        return $this->belongsTo(Entry::class, 'third_cmoy_id');
    }
}
