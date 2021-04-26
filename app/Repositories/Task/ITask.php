<?php

namespace App\Repositories\Task;

use App\Repositories\IRepository;

interface ITask extends IRepository
{
    /**
     * Get all data by field to table task
     *
     * @param string $field , $value
     * @return {collection} Return a collection task
     */
    public function filterByFied($field, $value);
}
