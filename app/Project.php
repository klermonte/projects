<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    const STATUS_NEW = 1;
    const STATUS_FINISHD = 2;
    const STATUS_IN_PROGRESS = 3;
    const STATUS_CLOSED = 4;

    protected $fillable = [
        'name',
        'deadline',
        'status',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
