<?php

namespace App\Services;

use App\Services\Traits\Relationable;
use App\Services\Traits\HandleExceptionMessage;
use App\Services\Traits\Sortable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class BaseService
{
    use Sortable;
    use HandleExceptionMessage;
    use Relationable;

    protected Model $model;

    public function all()
    {
        $model = $this->model;
        if (!empty($this->relations)) {
            $model->with($this->relations);
        }
        return $model
            ->orderBy($this->sortBy, $this->sortOrder)
            ->get();
    }

    public function paginated($paginate)
    {
        $model = $this->model;
        if (!empty($this->relations)) {
            $model->with($this->relations);
        }
        return $model
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
            $model = $this->model;
            if (!empty($this->relations)) {
                $model->with($this->relations);
            }
            $object = $model->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return $this::notFound($e->getMessage());
        }
        return $object;
    }

    public function children($id) {
        return $this->find($id)->children;
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
        dd("dang phat trien");
        return $this->find($id)->delete();
    }
}
