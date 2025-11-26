<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = ['name', 'test_date'];

    protected $casts = [
        'test_date' => 'datetime',
    ];
}
