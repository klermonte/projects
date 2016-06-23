<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'description',
        'assigned_to',
        'deadline'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function assignment()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function reassignments()
    {
        return $this->hasMany(Reassignment::class);
    }
}
