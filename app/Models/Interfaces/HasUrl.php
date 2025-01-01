<?php

namespace App\Models\Interfaces;

interface HasUrl
{
    public function uri($lang = null): string;

    public function url($lang = null): string;
}
