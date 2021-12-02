<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    use HasFactory;

    public static function newTimesheet($data)
    {
        $timesheet = new static;
        $timesheet->fill($data);
        if ($timesheet->save()) {
            return $timesheet;
        }
        return false;
    }

    protected $fillable = [
        'employee_id',
        'date',
        'time_in',
        'time_out',
        'lunch_start',
        'lunch_end'
    ];

    public function getId()
    {
        return $this->id;
    }

    public function getEmployeeId()
    {
        return $this->employee_id;
    }

    public function getTimeIn()
    {
        return $this->time_in;
    }

    public function getTimeOut()
    {
        return $this->time_out;
    }

    public function getLunchStart()
    {
        return $this->lunch_start;
    }

    public function getLunchEnd()
    {
        return $this->lunch_end;
    }

}
