<?php

namespace App\Traits;

trait HasNotes
{
    public function notes()
    {
        return $this->morphOne('App\Models\Note', 'noteable');
    }
}
