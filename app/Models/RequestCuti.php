<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestCuti extends Model
{
    //
    protected $table = 'request_cuti';

    protected $guarded = ['id'];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
