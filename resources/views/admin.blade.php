@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Student ID</th>
                                <th scope="col">Student Email</th>
                                <th scope="col">Project Name</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($value as $a)
                                <tr>
                                    <td>{{$a->std_id}}</td>
                                    <td>{{$a->std_email}}</td>
                                    <td>{{$a->project_name}}</td>
                                    <td><a href="{{'/admin/'.$a->id.'/view'}}"><input type="button" value="view" class="btn btn-success"></a></td>
                                    <td><a href="{{'/admin/'.$a->id.'/edit'}}"><input type="button" value="Edit" class="btn btn-primary"></a></td>
                                    <td>
                                        <form class="" action="/admin/project/{{$a->id}}" method="post">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <input class="form-control btn btn-danger" type="submit" value="Delete">
                                        </form>
                                    </td>
                                    @endforeach
                                    </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
