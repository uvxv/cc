<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Penalty extends Model
{
    protected $fillable = [
        'location',
        'amount',
        'date_issued',
        'status',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
