<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';

    protected $fillable = [
        'name',
        'lastname',
        'profile',
        'bgProfile',
        'email',
        'rating',
        'message',
        'status'
    ];

    public function commentable(){
        return $this->morphTo();
    }
}
