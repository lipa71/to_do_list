<?php

namespace App\Models;

use App\Enums\Tasks\TaskPriorityEnum;
use App\Enums\Tasks\TaskStateEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $table = 'tasks';
    protected $fillable = [
        'name',
        'description',
        'priority',
        'state',
        'deadline',
        'user_id',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function priorityDescription(): string
    {
        return TaskPriorityEnum::description($this->priority);
    }

    public function stateDescription(): string
    {
        return TaskStateEnum::description($this->state);
    }
}
