
@extends('layouts.app')

@section('content')
<div style='width:70%; margin-left:auto; margin-right:auto'>

    <h1>Edit Employee Details</h1>
    <hr>
    <form action="{{url('/CRM/employee', [$employee->id])}}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title"> First Name</label>
            <input type="text" value="{{$employee->firstname}}" class="form-control" id="taskTitle"  name="firstname" >
        </div>
        <div class="form-group">
            <label for="description"> Last Name</label>
            <input type="text" value="{{$employee->lastname}}" class="form-control" id="taskDescription" name="lastname" >
        </div>
        <div class="form-group">
            <label for="description">Email</label>
            <input type="text" value="{{$employee->email}}" class="form-control" id="taskDescription" name="email" >
        </div>
        <div class="form-group">
            <label for="description">Phone</label>
            <input type="text" value="{{$employee->phone}}" class="form-control" id="taskDescription" name="phone" >
        </div>
        <div class="form-group">
            <label for="description">Company</label>
            <!-- <input type="text" value="{{$employee->company_id}}" class="form-control" id="taskDescription" name="company_id" > -->
            <select class="form-control" id="taskDescription" name="company_id">
                <option>---Select Company--- </option>
                @foreach($companys as $company)
                @if ($company->id == $employee->company_id)
                   <option selected value='{{ $company->id }}'> {{ $company->name }}</option>
             
                  @else   
                    <option value='{{ $company->id }}'> {{ $company->name }}</option>
                @endif 
                @endforeach
            </select>    
        </div>
        
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        <button type="submit" class="btn btn-primary">Update Details</button>

    </form>
 </div>   
@endsection