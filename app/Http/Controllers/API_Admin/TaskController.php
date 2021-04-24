<?php

namespace App\Http\Controllers\API_Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Repositories\Task\TaskRepository;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    protected $taskRepository;

    /**
     * Construct TaskController
     *
     * @param TaskRepository $taskRepository
     */
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * Get all data to table Task
     * @return collection Return a collection Task
     */
    public function getAll()
    {
        $result = new TaskCollection($this->taskRepository->get());
        return response($result, 200);
    }

    /**
     * Get a Task by id
     * @return Task Return a Task
     */
    public function getById($id)
    {
        $result = new TaskResource($this->taskRepository->getById($id));
        return response($result, 200);
    }

    /**
     * Get All task by sumary
     *
     * @param {string} $sumary
     * @return {json}
     */
    public function filterByFied($field, $value)
    {
        $result = $this->taskRepository->filterByFied($field, $value);
        if (gettype($result) == "boolean") {
            return response(null, 400);
        }
        return response($result, 200);
    }

    /**
     * Create a new Task
     *
     * @param {TaskRequest} $request
     * @return {json}
     */
    public function create(TaskRequest $request)
    {
        $result = $this->taskRepository->create($request->all());
        if (empty($result->id)) {
            return response(null, 500);
        }
        return response($result, 200);
    }

    /**
     * Update a new Task
     *
     * @param {TaskRequest} $request
     * @param {int} $id
     * @return {json}
     */
    public function update(TaskRequest $request, $id)
    {
        $result = $this->taskRepository->update($id, $request->all());
        if ($result) {
            return response($result, 200);
        }
        return response($result, 500);
    }

    /**
     * Delete a new Task
     *
     * @param {int} $id
     * @return {json}
     */
    public function delete($id)
    {
        $result = $this->taskRepository->delete($id);
        if ($result) {
            return response($result, 200);
        }
        return response($result, 500);
    }
}
