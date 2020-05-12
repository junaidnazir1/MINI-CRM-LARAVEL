



@extends('layouts.app')

@section('content')
<div style='width:70%; margin-left:auto; margin-right:auto'>

    <h1>Edit Company Details</h1>
    <hr>
    <form action="{{url('/CRM/company', [$company->id])}}" method="POST" enctype='multipart/form-data'>
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Company Name</label>
            <input type="text" value="{{$company->name}}" class="form-control" id="taskTitle"  name="name" >
        </div>
        <div class="form-group">
            <label for="description">Company Email</label>
            <input type="text" value="{{$company->email}}" class="form-control" id="taskDescription" name="email" >
        </div>
        <div class="form-group">
            <label for="description">Company Website</label>
            <input type="text" value="{{$company->website}}" class="form-control" id="taskDescription" name="website" >
        </div>

        <div class="form-group">
            <label for="description">Company Logo</label>
            <input type="file" class="form-control" name="logo" id="logo">
            <label>Current Image  {{$company->logo}} </label>
            <!-- <input type="text" class="form-control" id="taskDescription" name="logo"> -->
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