<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JudgingGuide extends Model
{
    protected $fillable = [
        'name', 'description', 'url'
    ];

    public function categories() {
        return $this->hasMany(JudgingCategory::class);
    }
}
