<?php

namespace App\Repositories;

interface IRepository
{
    /**
     * Get all data to table task
     *
     * @return {collection} Return a collection task
     */
    public function get();

    /**
     * Get a task by id
     *
     * @param $id
     * @return {task|null}
     */
    public function getById($id);

    /**
     * Create a task new
     *
     * @param $attributes
     * @return {boolan}
     */
    public function create($attributes = []);

    /**
     * Update a task
     *
     * @param $attributes,$id
     * @return {boolan}
     */
    public function update($id, $attributes = []);

    /**
     * Delete a task
     *
     * @param $id
     * @return {boolan}
     */
    public function delete($id);
}
