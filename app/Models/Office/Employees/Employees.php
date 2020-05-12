<?php

namespace App\Models\Office\Employees;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $guarded = [];
    protected $table = 'employees';
    public function usersInfo(){
        return $this->belongsTo('App\Models\Office\Employees\EmployeesLogin','id');
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> laratrast
