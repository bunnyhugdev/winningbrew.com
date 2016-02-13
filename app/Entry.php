<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable = [
        'name', 'special_ingredients', 'comments'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
