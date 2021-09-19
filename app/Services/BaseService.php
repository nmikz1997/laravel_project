<?php

namespace App\Services;

use App\Services\Traits\HandleExceptionMessage;
use Illuminate\Database\Eloquent\Model;
use App\Services\Traits\Sortable;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class BaseService
{
    use Sortable;
    use HandleExceptionMessage;
    
    public $sortBy = 'created_at';
    public $sortOrder = 'asc';
    public array $relations = [];
    protected Model $model;

    public function all()
    {
        return $this->model
            ->with($this->relations)
            ->orderBy($this->sortBy, $this->sortOrder)
            ->get();
    }

    public function paginated($paginate)
    {
        return $this->model
            ->with($this->relations)
            ->orderBy($this->sortBy, $this->sortOrder)
            ->paginate($paginate);
    }

    public function create(FormRequest $input)
    {
        $model = $this->model;
        $model->fill($input->all());
        $model->save();

        return $model;
    }

    public function find($id)
    {
        try {
            $object = $this->model->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return $this::notFound($e->getMessage());
        }
        return $object;
    }

    public function update(FormRequest $input, $id)
    {
        $model = $this->find($id);
        $model->fill($input->all());
        $model->save();

        return $model;
    }

    public function destroy($id)
    {
        return $this->find($id)->delete();
    }
}
