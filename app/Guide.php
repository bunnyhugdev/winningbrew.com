<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    protected $fillable = [
        'name', 'description', 'url'
    ];

    public function styles() {
        return $this->hasMany(Style::class);
    }
}
