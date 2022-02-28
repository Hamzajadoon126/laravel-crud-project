<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeProfile;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\EmployeeValidate;

class EmployeeProfileController extends Controller
{
    public function index()
    {
        $employees = EmployeeProfile::all();
        return view('index',compact('employees'));
    }
    public function create()
    {
        return view ('create');
    }
    public function store( Request $request)
    {
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        
        EmployeeProfile::create($input);
       
     
        return redirect()->route('employee-profiles')
                        ->with('success','user profile created successfully.');
    }
    public function edit(EmployeeProfile $id)
    {
            
                  return view('edit',compact('id'));               
}

    public function update(Request $request, EmployeeProfile $id)
        
    {
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
          
        $id->update($input);
    
        return redirect()->back()
                        ->with('success','user profile updated successfully');
    }

    public function delete(EmployeeProfile $id)
    {
        $id->delete();
     
        return redirect()->back()
                        ->with('success','user profile deleted successfully');
    }

}
