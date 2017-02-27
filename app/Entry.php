<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable = [
        'name', 'special_ingredients', 'comments', 'competition_id', 'style_id',
        'label', 'cobrewer', 'received', 'received_comments', 'score'
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
    
    public function printLabel() {
        return $this->style->mappingForJudgingGuide($this->competition->judging_guide_id)->judgingCategory->ordinal .
            ' - ' . $this->label . ' - ' . $this->style->subcategory;
    }
}
