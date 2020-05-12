@extends('layouts.app')

@section('content')

<h3 style='text-align:center'> Employees Details</h3>
<div class="jumbotron text-center">
    <p>
        <strong>First Name:</strong> {{ $employee->firstname }}<br>
        <strong>First Name:</strong> {{ $employee->lastname}}<br>
        <strong> Email</strong> {{ $employee->email }}<br>
        <strong> Phone</strong> {{ $employee->phone }}<br>
        <strong> Company Name</strong> {{ $employee->name }}<br>
     
        

    </p>
</div>
@endsection