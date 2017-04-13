<?php

namespace App\Repositories;

use App\Competition;
use App\Guide;

class StyleRepository {
    const BEER = 'beer';
    const MEAD = 'mead';
    const CIDER = 'cider';

    public function getCompetitionStyles(Competition $competition) {
        return $competition->guide->styles()->orderBy('id')->get();
    }

    public function getGuides() {
        return Guide::all();
    }
}
