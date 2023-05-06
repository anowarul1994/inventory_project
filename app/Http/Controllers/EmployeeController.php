<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;


class EmployeeController extends Controller
{
    /**
     * Show the form for creating the resource.
     */
    public function create()
    {
        return view('backend.pages.employee.create');
    }
    
    /**
     * 
     */

    public function index()
    {
        $employees = Employee::latest()->paginate(10);
        return view('backend.pages.employee.index', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|string',
            'email' => 'required',
            'phone' => 'required|min:11|max:11',
            'address' => 'required',
            'experience' => 'required',
            'image' => 'required',
            'nid_no' => 'required|min:10|max:17',
            'salary' => 'required',
            'vacation' => 'required',
            'city' => 'required',
        ]);

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->experience = $request->experience;
        $employee->nid_no = $request->nid_no;
        $employee->salary = $request->salary;
        $employee->vacation = $request->vacation;
        $employee->city = $request->city;
        $employee->user_id = auth()->user()->id;
        $employee->status = 0;

        //$post_data = $request->except('image');
        
        if ($request->file('image')){
            
            $photo = $request->file('image');
            $width = 150;
            $height = 192;
         
            $path = '/image/employee/';
          
            $name = Str::slug($request->input('name').'-'.Carbon::now()->toDayDateTimeString()).'.webp';

            $employee->image = $name; 

            ImageUploadController::imageUpload($photo, $width, $height, $path, $name);   
                  
        }
       
        $employee->save();
        
        //Employee::create($post_data);

        session()->flash('msg', 'Employee Created Successfully');
        session()->flash('cls', 'success');
        return redirect()->route('employees.index');
    }

    
    public function show($id)
    {
        $employee = Employee::find($id);
        
        return view('backend.pages.employee.show', compact('employee'));
    }

    
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('backend.pages.employee.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    { 

        $request->validate([
            'name' => 'required|min:3|string',
            'email' => 'required',
            'phone' => 'required|min:11|max:11',
            'address' => 'required',
            'experience' => 'required',
            'nid_no' => 'required|min:10|max:17',
            'salary' => 'required',
            'vacation' => 'required',
            'city' => 'required',
        ]);
        

        $employeeData = Employee::find($id);
        $employee_data = $request->except('image');
            
        // $employee->name = $request->name;
        // $employee->email = $request->email;
        // $employee->phone = $request->phone;
        // $employee->address = $request->address;
        // $employee->experience = $request->experience;
        // $employee->nid_no = $request->nid_no;
        // $employee->salary = $request->salary;
        // $employee->vacation = $request->vacation;
        // $employee->city = $request->city;
        // $employee->status = $request->status;

     
        if ($request->file('image')){
            $photo = $request->file('image');
            $width = 150;
            $height = 192;
            $path = 'image/employee/';
            $name = Str::slug($request->input('name').'-'.Carbon::now()->toDayDateTimeString()).'.webp';

            $employee_data['image'] = $name; 
            ImageUploadController::imageUpload($photo, $width, $height, $path, $name);   
                 
            if( $employeeData->image!= null){
            //$path = 'image/employee/';
            ImageUploadController::unlinkImage($path, $employeeData->image);
        }
        }else{
            $employee_data['image']= $employeeData->image; 
        }
        
        $employeeData->update($employee_data);
        session()->flash('msg', 'Employee Updated Successfully');
        session()->flash('cls', 'success');
        return redirect()->route('employees.index');
    }

    
    public function destroy($id)
    {
        $employee = Employee::find($id);
        if( $employee->image!= null){
            $path = 'image/employee/';
            ImageUploadController::unlinkImage($path, $employee->image);
        }
        
        $employee->delete();
        session()->flash('msg', 'Employee Delete Successfully');
        session()->flash('cls', 'warning');
        return redirect()->route('employees.index');
    }




    
}
