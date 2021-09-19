<?php

namespace App\Services\Traits;

trait Sortable
{
    public $sortBy = 'created_at';

    public $sortOrder = 'asc';

    public function setSortBy($sortBy = 'created_at')
    {
        $this->sortBy = $sortBy;
        return $this;
    }

    public function setSortOrder($sortOrder = 'desc')
    {
        $this->sortOrder = $sortOrder;
    }

    public function desc() {
        $this->setSortOrder('desc');
    }

    public function asc()
    {
        $this->setSortOrder('asc');
    }
}