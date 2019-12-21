<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessToken extends Model
{
    protected $guarded = [];

    protected $casts = [
        'expires_at' => 'Datetime'
    ];

    protected $appends = ['has_expired'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getHasExpiredAttribute()
    {
        return now()->timestamp < $this->attributes['expires_at'];
    }
}
