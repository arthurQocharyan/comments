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
        return $this->hasMany($this, "parent_id");
    }
    public function commReply()
    {
        return $this->comments()->with('commReply');
    }
}
