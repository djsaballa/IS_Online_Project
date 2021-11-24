<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
        public static function newEmployee($data)
    {
        $employee = new static;
        $employee->fill($data);
        if ($employee->save()) {
            return $employee;
        }
        return false;
    }
}
