@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>All Companies</h2></div>

                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Website</th>
                                    <th>Logo</th>
                                    <th>Edit</th>
                                    <th>Show</th>
                                    <th>Delete</th>
                                  
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($companys as $company)
                                <tr>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td>{{ $company->website }}</td>
                                    <td><img src=/images/{{$company->logo}} style='width:50px; height:50px'> </td>
                                    <td><a href="{{action('CompanysController@edit',$company->id)}}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td><a href="{{action('CompanysController@show',$company->id)}}" class="btn btn-primary">Show</a></td>
                                      <td>
                                        <form action="{{ route('company.destroy', $company->id) }}" method="POST"
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
                                        <td colspan="7">No record found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $companys->links() }}
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection