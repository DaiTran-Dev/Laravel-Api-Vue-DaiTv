<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    public $fieldAll =['id','project_id', 'issue_type', 'assignee', 'reporter', 'due_date', 'description', 'attachment', 'summary','updated_at','created_at'];
    protected $fillable = ['project_id', 'issue_type', 'assignee', 'reporter', 'due_date', 'description', 'attachment', 'summary'];
}
