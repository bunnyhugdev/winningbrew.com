<?php

namespace App\Repositories;

use App\Style;

class StyleRepository {
    const BEER = 'beer';
    const MEAD = 'mead';
    const CIDER = 'cider';

    public function getAllStyles() {
        return Style::orderBy('id')->get();
    }

}
