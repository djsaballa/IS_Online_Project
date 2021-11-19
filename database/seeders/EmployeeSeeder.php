<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $employees_file = "employee.csv";
        if (file_exists($employees_file)) {
            error_log("File Exists");
            $f = file($employees_file);
            $headers = explode(',', $f[0]);
            for ($i = 1; $i < count($f); $i++) {
                $row = explode(',', $f[$i]);
        
               
            for ($x = 0;  $x < count($row); $x++) {
                   $record[ trim($headers[$x]) ] = $row[$x];
                   
                }
               Employee::newEmployee($record);

            }
        } else {
            error_log("File does not Exist");
        }
       
    }
}
