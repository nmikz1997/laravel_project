<?php

namespace App\Models\Traits;

trait Relationable
{
    public $relations = [];

    public function setRelations($relations = null)
    {
        $this->relations = $relations;
    }
}