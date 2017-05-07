<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'text', 'parent_id',
    ];
    public function comments()
    {
        return $this->hasMany(__Class__, "parent_id");
    }
    public function childrens()
    {
        return $this->comments()->with('childrens');
    }
}
