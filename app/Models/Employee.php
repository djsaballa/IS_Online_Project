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

    protected $table = 'employees';

    public function getId()
    {
        return $this->id;
    }

    public function getLastName()
    {
        return $this->lastname;
    }

    public function getFirstName()
    {
        return $this->firstname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }
}
