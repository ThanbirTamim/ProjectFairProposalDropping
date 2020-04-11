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

                        <form method="post" action="/admin/{{$value->id}}/edit" enctype="multipart/form-data" class="form-group">
                            @csrf
                            <input class="form-control" type="text" name="std_id" value="{{$value->std_id}}" readonly><br>
                            <input class="form-control" type="text" name="std_email" value="{{$value->std_email}}" readonly><br>
                            <input class="form-control" type="text" name="project_name" value="{{$value->project_name}}" required><br>
                            <textarea class="form-control" type="text" name="project_description" required>{{$value->project_description}}</textarea><br>
                            <input class="form-control btn btn-primary" type="submit" name="Update">
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
