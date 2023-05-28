<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// created by CodeMort
class Banner extends Model
{
    use HasFactory;
    protected $table = 'banners';
    protected $fillable = [
        'urlImage',
        'status'
    ];
}
