<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    use HasFactory;
    protected $table = 'dictionaries';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [ 
        'password'
    ];
}
