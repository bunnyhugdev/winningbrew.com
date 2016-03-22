<?php

namespace App\Repositories;

use App\Competition;

class StyleRepository {
    const BEER = 'beer';
    const MEAD = 'mead';
    const CIDER = 'cider';

    public function getCompetitionStyles(Competition $competition) {
        return $competition->guide->styles()->orderBy('id')->get();
    }

}
