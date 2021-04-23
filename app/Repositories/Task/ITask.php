<?php

namespace App\Repositories\Task;

interface ITask
{
    /**
     * Get all data by field to table task
     *
     * @param string $field , $value
     * @return {collection} Return a collection task
     */
    public function filterTaskByFied($field, $value);
}
