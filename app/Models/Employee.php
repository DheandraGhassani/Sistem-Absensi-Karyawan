<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model

{

    protected $table = 'employees';

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }
};
