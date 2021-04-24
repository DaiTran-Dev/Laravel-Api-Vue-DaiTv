<?php

namespace App\Repositories\Task;

use App\Repositories\BaseRepository;
use App\Repositories\Task\ITask;
use App\Models\Task;

class TaskRepository extends BaseRepository implements ITask
{
    /**
     * Get model class
     * @return Model::class
     */
    function getModel()
    {
        return Task::class;
    }

    /**
     * Get all data by filed to table task
     *
     * @param string $field $value
     * @return {collection} Return a collection task
     */
    public function filterByFied($field, $value)
    {
        if (gettype($this->model->fieldAll) == "array") {
            if (in_array($field, $this->model->fieldAll)) {
                return $this->model->where($field, 'like', '%' . $value . '%')->get();
            }
        }
        return false;
    }
}
