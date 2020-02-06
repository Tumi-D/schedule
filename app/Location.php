<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded = [];
    public function users()
    {
        return $this->belongsToMany(User::class)
            ->wherePivot('selected', 'session');
    }
}
