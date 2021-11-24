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
}
