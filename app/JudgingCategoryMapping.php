<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JudgingCategoryMapping extends Model
{
    protected $fillable = [
        'judging_category_id', 'style_id'
    ];

    public function judgingCategory() {
        return $this->belongsTo(JudgingCategory::class);
    }

    public function style() {
        return $this->belongsTo(Style::class);
    }
}
