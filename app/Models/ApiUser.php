<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApiUser extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $guarded = [];
}
