<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'parent_id', 'parent_answer', 'content', 'writer_id',
    ];

    public function writer()
    {
        return $this->hasOne('App\User', 'id', 'writer_id');
    }

    public function question()
    {
        return $this->belongsTo('App\Question', 'parent_id');
    }

    public function answer()
    {
        return $this->belongsTo('App\Answer', 'parent_id');
    }
}
