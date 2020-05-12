
@extends('layouts.app')

@section('content')
<div style='width:70%; margin-left:auto; margin-right:auto'>
<h1>Add New Employee Details</h1>
<hr>
<form action="/CRM/employee" method="post">
{{ csrf_field() }}
                                 
    <div class="form-group" >
        <label for="title">First Name</label>
        <input type="text" class="form-control" id="taskTitle"  name="firstname">
    </div>
    <div class="form-group">
        <label for="description">Last Name</label>
        <input type="text" class="form-control" id="taskDescription" name="lastname">
    </div>
    <div class="form-group">
        <label for="description">Email</label>
        <input type="text" class="form-control" id="taskDescription" name="email">
    </div>
    <div class="form-group">
        <label for="description">Contact</label>
        <input type="text" class="form-control" id="taskDescription" name="phone">
    </div>
    <div class="form-group">
        <label for="description">Company</label>
        <!-- <input type="text" class="form-control" id="taskDescription" name="company_id"> -->
        <select class="form-control" id="taskDescription" name="company_id">
           <option>---Select Company--- </option>
           @foreach($companys as $company)
             <option value='{{ $company->id }}'> {{ $company->name }}</option>
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
    <button type="submit" class="btn btn-primary">Add</button>
</form>

</div>
@endsection