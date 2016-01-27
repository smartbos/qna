<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QnaPost extends Model
{
    protected $fillable = [
        'title', 'content', 'writer_id',
    ];

    public function writer()
    {
        return $this->hasOne('App\User', 'id', 'writer_id');
    }
}
