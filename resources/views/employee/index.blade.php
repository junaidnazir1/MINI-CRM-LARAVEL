


@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>All Employees</h2></div>

                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Company Name</th>
                                    <th>Edit</th>
                                    <th>Show</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($employees as $employee)
                              
                                
                                <tr>
                                    <td>{{ $employee->firstname }}</td>
                                    <td>{{ $employee->lastname }}</td>
                                     <td>{{ $employee->email }}</td>
                                     <td>{{ $employee->phone }}</td>
                                     <td>{{ $employee->name }} </td>
                                     <td><a href="{{action('EmployeesController@edit',$employee->id)}}" class="btn btn-primary">Edit</a></td>
                                     <td><a href="{{action('EmployeesController@show',$employee->id)}}" class="btn btn-primary">Show</a></td>
                                     <td><form action="{{ route('employee.destroy', $employee->id) }}" method="POST"
                                              style="display: inline"
                                              onsubmit="return confirm('Are you sure?');">
                                            <input type="hidden" name="_method" value="DELETE">
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                    
                                   
                                   
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No entries found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $employees->links() }}
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection	
