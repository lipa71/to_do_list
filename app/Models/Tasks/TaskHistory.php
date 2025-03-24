<?php

namespace App\Models\Tasks;

use Illuminate\Database\Eloquent\Model;

class TaskHistory extends Model
{
    protected $table = 'tasks_history';
    protected $fillable = [
        'task_id',
        'column_name',
        'old_value',
        'new_value',
    ];
}
