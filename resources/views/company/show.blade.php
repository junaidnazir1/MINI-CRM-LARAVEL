@extends('layouts.app')

@section('content')

<h3 style='text-align:center'> Company Details</h3>
<div class="jumbotron text-center">
    <p>
         <img src=/images/{{$company->logo}} style='width:50px; height:50px'><br><br>
        <strong>Company Name:</strong> {{ $company->name }}<br>
        <strong>Company Email</strong> {{ $company->email }}<br>
        <strong>Company Website</strong> {{ $company->website }}<br>

    </p>
</div>
@endsection