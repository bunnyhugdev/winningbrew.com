<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    public function mappings() {
        return $this->hasMany(JudgingCategoryMapping::class);
    }
    
    public function mappingForJudgingGuide($judgingGuideId) {
        return $this->mappings->first(function($key, $item) use ($judgingGuideId) {
            return $item->judgingCategory->judging_guide_id === $judgingGuideId;
        });
    }
}
