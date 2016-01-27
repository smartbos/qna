<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'content', 'writer_id',
    ];

    public function writer()
    {
        return $this->hasOne('App\User', 'id', 'writer_id');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer', 'q_id');
    }
}
