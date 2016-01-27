<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'commentable_id', 'commentable_type', 'content', 'writer_id',
    ];

    public function writer()
    {
        return $this->hasOne('App\User', 'id', 'writer_id');
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function question()
    {
        return $this->belongsTo('App\Question', 'commentable_id');
    }

    public function answer()
    {
        return $this->belongsTo('App\Answer', 'commentable_id');
    }
}
