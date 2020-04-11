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
                                <th scope="col">Project name</th>
                                <th scope="col">Project Description</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$value->project_name}}</td>
                                    <td>{{$value->project_description}}</td>
                                </tr>
                            </tbody>
                        </table>
                    <a href="/admin" class="btn btn-success">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
