<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matrix extends Model
{
    use HasFactory;

    protected $table ='matrix';
    protected $fillable= [
        'c1',
        'c2',
        'c3',
        'c4'
    ];
}
