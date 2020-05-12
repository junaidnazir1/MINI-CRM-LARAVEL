@extends('layouts.app')

@section('content')


<div style='width:70%; margin-left:auto; margin-right:auto'>
    <h1>Add New Company Details</h1>
    <hr>
    <form action="/CRM/company" method="post" enctype='multipart/form-data'>
    {{ csrf_field() }}
        <div class="form-group" >
            <label for="title">Company Name</label>
            <input type="text" class="form-control" id="taskTitle"  name="name">
        </div>
        <div class="form-group">
            <label for="description">Company Email</label>
            <input type="text" class="form-control" id="taskDescription" name="email">
        </div>
        <div class="form-group">
            <label for="description">Company Logo</label>
            <input type="file" class="form-control" name="logo" id="logo">
            <!-- <input type="text" class="form-control" id="taskDescription" name="logo"> -->
        </div>
        <div class="form-group">
            <label for="description">Company Website</label>
            <input type="text" class="form-control" id="taskDescription" name="website">
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