<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $searchTerm = $request->search_employee;

        // $perPage = 5000; // Define number of employees per page
        // $currentPage = $request->get('page', 1); // Get current page from request

        // $offset = ($currentPage - 1) * $perPage;

        $query = Employees::getAllRecords()
            ->orderBy('last_name');

        // if ($searchTerm) {
        //     $escapedTerm = str_replace('%', '\\%', $searchTerm);
        //     $query->where('emp_name', 'like', "%{$escapedTerm}%");
        //     $count_emp = Employee::getAllRecords()
        //         ->where('emp_name', 'like', "%{$escapedTerm}%")
        //         ->count();
        // } else {
        //     $count_emp = Employee::getAllRecords()
        //         ->count();
        // }

        $employees = $query
            // ->skip($offset)
            // ->take($perPage)
            ->get();

        foreach ($employees as $emp) {
            $emp->dept_name = $emp->dept_name ?? 'Unassigned';  // Replace with desired default
            $emp->dept_abbrev = $emp->dept_abbrev ?? 'Unassigned';  // Replace with desired default
            $emp->appointment_abbrev = $emp->appointment_abbrev ?? 'Unassigned';  // Replace with desired default
            $emp->appointment_class = $emp->appointment_class ?? 'Unassigned';  // Replace with desired default
            $emp->appointment_desc = $emp->appointment_desc ?? 'Unassigned';  // Replace with desired default
        }

        foreach ($employees as $key => $value) {
            $dateTime = Carbon::parse($value->created_at);
            $value->created_at = $dateTime->format('M j, Y g:ia');
        }

        // $departments = Departments::all();
        // $departmentOptions = [];

        // foreach ($departments as $department) {
        //     $departmentOptions[] = [
        //         'dept_value' => $department->id,
        //         'dept_text' => $department->dept_name,
        //     ];
        // }

        // $appointments = Appointments::all();
        // $appointmentOptions = [];

        // foreach ($appointments as $appointment) {
        //     $appointmentOptions[] = [
        //         'appt_value' => $appointment->id,
        //         'appt_text' => $appointment->appointment_desc,
        //     ];
        // }

        // $totalPages = ceil($count_emp / $perPage);
        // // $totalPages = ceil(Employee::count() / $perPage); // Calculate total pages

        // return view('forms.employees', [
        //     'employees' => $employees,
        //     // 'departmentOptions' => $departmentOptions,
        //     // 'appointmentOptions' => $appointmentOptions,
        //     // 'currentPage' => $currentPage,
        //     // 'totalPages' => $totalPages,
        //     // 'perPages' => $perPage,
        //     // 'search_emp' => $searchTerm,
        //     // 'count_emp' => $count_emp,
        //     // 'searchTerm' => $request->get('search_employee'),
        //     // 'isActive' => true,
        // ]);
        // $employees = Employees::all();
        return Inertia::render('Employees', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Employees $employees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employees $employees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employees $employees)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employees $employees)
    {
        //
    }
}
