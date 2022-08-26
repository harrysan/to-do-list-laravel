<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['task', 'tier_task_id', 'user_id'];

    public function tiertasks() {
        return $this->belongsTo('App\Models\TierTask', 'tier_task_id');
    }

    public function user() {
        return $this->belongsTo('App\Models\User', 'id');
    }

}
