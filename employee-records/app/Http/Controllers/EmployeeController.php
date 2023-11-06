<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class EmployeeController extends Controller
{
    // this function used to get the employees database, count the number of male and female, average age of employees, and total salary of all employees
    public function index() 
    {
        $genderData = DB::table('employees') // Getting all employees
            ->select(DB::raw('count(*) as gender_count, gender')) // counting male and female
            ->groupBy('gender')
            ->get();
    
        $totalMonthlySalary = Employees::sum('monthly_salary');
    
        // Calculate the average age
        $averageAge = Employees::avg(
            DB::raw('YEAR(NOW()) - YEAR(birthday) - (DATE_FORMAT(NOW(), "%m%d") < DATE_FORMAT(birthday, "%m%d"))')
        );
        
        // compiling all the data to an array called data
        $data = [
            'genderData' => $genderData,
            'namesData' => Employees::orderBy('created_at', 'desc')->paginate(10),
            'totalMonthlySalary' => $totalMonthlySalary,
            'averageAge' => $averageAge,
        ];
    
        return view('employees.index', compact('data'));
    }
    

    // this function used to direct the user to the create page to add new employee 
    public function create(){
        return view('employees.create')->with('title', 'Add New'); 
    }

    // this fucntion used to validate and store the newly added employee
    public function store(Request $request){
        $validated = $request->validate([
            "first_name" => ['required', 'min:4'],
            "last_name" => ['required', 'min:4'],
            "gender" => 'required|in:Male,Female',
            "birthday" => ['required'],
            "monthly_salary" => 'required|numeric|min:0',
        ]);

        Employees::create($validated);

        return redirect('/');
    }

    // this fucntion used to locate or find the employee information based on its ID
    public function show($id){
        $data = Employees::findOrFail($id);
        return view('employees.edit', ['employee' => $data]);
    }

    // this fucntion used to validate and update the employee's information
    public function update(Request $request, Employees $employee) {
        $validated = $request->validate([
            "first_name" => ['required', 'min:4'],
            "last_name" => ['required', 'min:4'],
            "gender" => 'required|in:Male,Female',
            "birthday" => ['required'],
            "monthly_salary" => 'required|numeric|min:0',
        ]);
    
        $employee->update($validated);
    
        return redirect('/');
    }
    
    // this fucntion used to delete an employee
    public function destroy(Request $request, Employees $employee){
        $employee->delete();

        return redirect('/'); 
    }
    
}
