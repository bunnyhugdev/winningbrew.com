<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JudgingCategory extends Model
{
    protected $fillable = [
        'ordinal', 'name', 'sort_order', 'judging_guide_id'
    ];

    public function guide() {
        return $this->belongsTo(JudgingGuide::class);
    }

    public function mappings() {
        return $this->hasMany(JudgingCategoryMapping::class);
    }
}
