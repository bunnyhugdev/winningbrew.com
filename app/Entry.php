<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable = [
        'name', 'special_ingredients', 'comments', 'competition_id', 'style_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function competition() {
        return $this->belongsTo(Competition::class);
    }

    public function style() {
        return $this->belongsTo(Style::class);
    }
}
