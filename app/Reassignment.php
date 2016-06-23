<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reassignment extends Model
{
    protected $fillable = [
        'comment',
        'to',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
    
    public function toUser()
    {
        return $this->belongsTo(User::class, 'to');
    }
    
    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from');
    }
}
