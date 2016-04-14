<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'competition_id', 'judging_category_id', 'first_entry_id',
        'second_entry_id', 'third_entry_id'
    ];

    public function competition() {
        return $this->belongsTo(Competition::class);
    }

    public function category() {
        return $this->belongsTo(JudgingCategory::class);
    }

    public function firstPlace() {
        return $this->belongsTo(Entry::class, 'first_entry_id');
    }

    public function secondPlace() {
        return $this->belongsTo(Entry::class, 'second_entry_id');
    }

    public function thirdPlace() {
        return $this->belongsTo(Entry::class, 'third_entry_id');
    }

    public function setFirstEntryIdAttribute($value) {
        $this->attributes['first_entry_id'] = empty($value) ? null : $value;
    }

    public function setSecondEntryIdAttribute($value) {
        $this->attributes['second_entry_id'] = empty($value) ? null : $value;
    }

    public function setThirdEntryIdAttribute($value) {
        $this->attributes['third_entry_id'] = empty($value) ? null : $value;
    }
}
