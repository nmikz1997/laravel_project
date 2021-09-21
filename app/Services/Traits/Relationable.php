<?php

namespace App\Services\Traits;

trait Relationable
{
    public $relations = [];

    public function setRelations($relations = null)
    {
        $this->relations = $relations;
        return $this;
    }
}