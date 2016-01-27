<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'q_id', 'content', 'writer_id',
    ];

    public function writer()
    {
        return $this->hasOne('App\User', 'id', 'writer_id');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function question()
    {
        return $this->belongsTo('App\Question', 'q_id');
    }
}
