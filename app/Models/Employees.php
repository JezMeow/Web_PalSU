<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employees extends Model
{
    use HasFactory;

    protected $fillable = [
        'emp_id',
        'univ_id',
        'first_name',
        'last_name',
        'middle_name',
        'suffix_name',
        'emp_name',
        'emp_class',
        'dept_id',
        'appointment_id',
        'designation_desc',
    ];

    protected $table = 'employees';

    // Define a  method to query all records with corresponding joins
    public static function getAllRecords()
    {
        $data = DB::table('employees')
            // return DB::table('employees')
            ->leftJoin('departments', 'employees.dept_id', '=', 'departments.id')
            ->leftJoin('appointments', 'employees.appointment_id', '=', 'appointments.id')
            ->select('employees.*', 'departments.dept_name', 'departments.dept_abbrev', 'appointments.appointment_abbrev', 'appointments.appointment_class', 'appointments.appointment_desc');

        return $data;
        // Alternatively, you can use other query builder methods:
        // return self::where('column', 'value')->get();
    }


    /**
     * Get employees by company_id.
     *
     * @param int $companyId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getByCompanyId($idx)
    {
        $data = DB::table('employees')
            ->leftJoin('departments', 'employees.dept_id', '=', 'departments.id')
            ->leftJoin('appointments', 'employees.appointment_id', '=', 'appointments.id')
            ->select('employees.*', 'departments.dept_name', 'departments.dept_abbrev', 'appointments.appointment_abbrev', 'appointments.appointment_class', 'appointments.appointment_desc')
            ->where('employees.id', $idx)
            ->get();

        // Loop through results and set default values for null department data
        foreach ($data as $employee) {
            $employee->dept_name = $employee->dept_name ?? 'Unassigned';  // Replace with desired default
            $employee->dept_abbrev = $employee->dept_abbrev ?? 'Unassigned';  // Replace with desired default
            $employee->appointment_abbrev = $employee->appointment_abbrev ?? 'Unassigned';  // Replace with desired default
            $employee->appointment_class = $employee->appointment_class ?? 'Unassigned';  // Replace with desired default
            $employee->appointment_desc = $employee->appointment_desc ?? 'Unassigned';  // Replace with desired default
        }

        return $data;
    }
}
