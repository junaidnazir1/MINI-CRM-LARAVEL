<?php

namespace App\Http\Controllers;

use App\Companys;
use Illuminate\Http\Request;
use Log;
use Image;
use Storage;
use App\Employees;

class CompanysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companys = Companys::paginate(5);
        log::info($companys);
        return view('company.index', compact('companys'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info($request);
        $company = new Companys();
        $data = $this->validate($request, [
            'name'=>'required',
            'email'=> 'required',
            'logo'=> 'required|dimensions:min_width=200,min_height=200',
            'website'=>'required'
        ]);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->logo = "hello";
        // if($request->hasfile('logo')) {
        //     $image=$request->file('logo');
        //     $filename=time().'.'.$image->getClientOriginalExtension();
        //     $location=public_path('images/').$filename;
        //     Image::make($image)->save($location);
        //     $company->logo=$filename;
        // }
        $company->save();
        return redirect('/CRM/company');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Companys  $companys
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $company= Companys::find($id);
        return view('company.show', compact('company', $company));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Companys  $companys
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $company=Companys::find($id);
        return view('company.edit',compact('company',$company));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Companys  $companys
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'name'=>'required',
            'email'=> 'required',
            'logo'=> 'sometimes',
            'website'=>'required'
        ]);
        $company=Companys::find($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->logo="byee";
        // if($request->hasfile('logo')) {
        //     $image=$request->file('logo');
        //     $filename=time().'.'.$image->getClientOriginalExtension();
        //     $location=public_path('images/').$filename;
        //     Image::make($image)->save($location);
        //     $company->logo=$filename;
        // }
        $company->update();
        return view('company.show',compact('company',$company));
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Companys  $companys
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $company=Companys::find($id);
        $company->destroy($id);
        return redirect('/CRM/company/');
        
    }
     public function test1()
     {
         log::info("hello");
     }
   
}
