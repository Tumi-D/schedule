<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Location extends Model
{
    use LogsActivity;

    protected $guarded = [];
    protected static $logAttributes = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->wherePivot('selected', 'session');
    }
}
