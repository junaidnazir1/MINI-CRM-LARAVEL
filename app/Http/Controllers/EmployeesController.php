<?php

namespace App\Http\Controllers;

use App\Employees;
use Illuminate\Http\Request;
use App\Companys;
use Log;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
       
        $employees=Companys::join('Employees', 'Companys.id', '=' ,'Employees.company_id')->paginate(5);
         return view('employee.index', compact('employees'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $companys= Companys::all();
        return view('employee.create', compact('companys'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $employee = new Employees();
         $this->validate($request, [
            'firstname'=>'required',
            'lastname'=> 'required',
            'email'=> 'required',
            'phone'=>'required',
            'company_id'=>'required'
        ]);
        $employee->firstname= $request->firstname;
        $employee->lastname= $request->lastname;
        $employee->email= $request->email;
        $employee->phone= $request->phone;
        $employee->company_id =$request->company_id;
        $employee->save();
    
        return redirect('/CRM/employee/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee=Companys::join('Employees', 'Companys.id', '=' ,'Employees.company_id')->where('employees.id', $id)->first();
        return view ('employee.show', compact( 'employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $employee=Companys::join('Employees', 'Companys.id', '=' ,'Employees.company_id')->where('employees.id', $id)->first();
         $companys=Companys::all();
        return view('employee.edit', compact('employee',$employee, 'companys', $companys));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee=Employees::find($id);
        $employee->firstname= $request->firstname;
        $employee->lastname= $request->lastname;
        $employee->email= $request->email;
        $employee->phone= $request->phone;
        $employee->company_id =$request->company_id;
        $employee->update();
        return redirect('/CRM/employee/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee=Employees::find($id);
        $employee->destroy($id);
        return redirect('/CRM/employee/');
    }
}
