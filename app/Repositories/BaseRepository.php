<?php

namespace App\Repositories;

use App\Repositories\IRepository;

abstract class BaseRepository implements IRepository
{
    /**
     * Attribute $model
     */
    protected $model;

    /**
     * construct
     */
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * Get model class
     * @return Model::class
     */
    abstract function getModel();

    /**
     * Set value attribute $model
     * @return void
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    /**
     * Get all data to table task
     *
     * @return {collection} Return a collection task
     */
    public function get()
    {
        return $this->model->all();
    }

    /**
     * Get a task by id
     *
     * @param $id
     * @return {task|null}
     */
    public function getById($id)
    {
        return $this->model->find($id);
    }

    /**
     * Create a task new
     *
     * @param $attributes
     * @return {bool}
     */
    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    /**
     * Update a task
     *
     * @param $attributes,$id
     * @return {bool}
     */
    public function update($id, $attributes = [])
    {

        $task = $this->model->find($id);
        if (!$task) {
            return false;
        }
        return $task->update($attributes);
    }

    /**
     * Delete a task
     *
     * @param $id
     * @return {bool}
     */
    public function delete($id)
    {
        $task = $this->model->find($id);
        if (!$task) {
            return false;
        }
        return $task->delete();
    }
}
