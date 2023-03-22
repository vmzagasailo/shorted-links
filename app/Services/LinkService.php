<?php

namespace App\Services;

use Illuminate\Support\Str;

class LinkService
{
    public function getLinkToken() : string
    {
        return str_shuffle(Str::upper(Str::random(3)) .  Str::lower(Str::random(3)) . mt_rand(10, 99));
    }
}
