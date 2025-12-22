<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LicenseApplication extends Model
{
    protected $fillable = [
        'license_number',
        'issue_date',
        'expiry_date',
        'category',
        'image',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
