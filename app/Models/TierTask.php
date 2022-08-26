<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TierTask extends Model
{
    use HasFactory;

    protected $fillable = ['tier', 'desc'];

    public function tasks() {
        return $this->hasMany('App\Models\Task');
    }
}
