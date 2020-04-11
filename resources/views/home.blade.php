@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Provide Your Project Information</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="/project-store" enctype="multipart/form-data" class="form-group">
                        @csrf
                        <input class="form-control" type="text" name="project_name" placeholder="Project Name" required><br>
                        <textarea class="form-control" type="text" name="project_description" placeholder="Description" required>

                        </textarea><br>
                        <input class="form-control btn btn-primary" type="submit" name="submit">
                    </form>
                        <br><br>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Submission ID</th>
                                <th scope="col">Project Name</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($value as $a)
                                @if ($a->std_email == Auth::user()->email)
                                    <tr>
                                        <td>{{$a->id}}</td>
                                        <td>{{$a->project_name}}</td>
                                        <td>
                                            <form class="" action="/home/{{$a->id}}" method="post">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <input class="form-control btn btn-danger" type="submit" value="Delete">
                                            </form>
                                        </td>
                                @endif
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
