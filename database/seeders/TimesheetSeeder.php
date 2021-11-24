<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Timesheet;

class TimesheetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timesheets_file = "timesheet.csv";
        if (file_exists($timesheets_file)) {
            error_log("File Exists");
            $f = file($timesheets_file);
            $headers = explode(',', $f[0]);
            for ($i = 1; $i < count($f); $i++) {
                $row = explode(',', $f[$i]);
                for ($x = 0; $x < count($row); $x++) {
                    $record[trim($headers[$x])] = $row[$x];
                }
                Timesheet::newTimesheet($record);
            }
        } else {
            error_log("File does not Exist");
        }
    }
}
