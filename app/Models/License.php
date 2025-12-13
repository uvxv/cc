<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    protected $primaryKey = 'license_id';

    protected $fillable = [
        'number',
        'issue_date',
        'expiry_date',
        'category',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
