@extends('home')

@section('wrap_content')
    <div id="content">
        <div class="container-fluid mt-3">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit project</h1>
            </div>
            <!-- Content Row -->
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <form action="{{route("project.edit.action", $project)}}" method="post">
                                @csrf
                                <div class="row no-- align-items-center">
                                    <div class="col mr-2">
                                        <div class="form-group">
                                            <input class="form-control" name="title" type="text" value="{{$project->title}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-- align-items-center">
                                    <div class="col-md-6">
                                        <input type="radio" id="private" value="private" name="type" {{$project->visibility ==="private" ? "checked":""}}  required>
                                        <label for="private">Private</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="radio" id="public" value="public" name="type"  {{$project->visibility ==="public" ? "checked":""}}  required>
                                        <label for="public">Public</label>
                                    </div>
                                </div>
                                <div class="row no-- align-items-center {{$project->visibility ==="private" ?"d-none":""}}" id="contributors">
                                    <div class="col-md-12">
                                        <div>Contributors:</div>
                                        <select class="form-control" name="users[]" id="users" multiple>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}" {{in_array($user->id, $sel) ? "selected":"" }} > {{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-2 no-- align-items-center">
                                    <div class="col-md-12">
                                        <button class="btn btn-block btn-success">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                    <!-- Content Row -->



                    <!-- Content Row -->
                    <div class="row"></div>

                </div>
                <!-- /.container-fluid -->

            </div>

            <script>
                $("input[name='type']").on("change", function () {
                    if($(this).val() === "public") $("#contributors").removeClass("d-none");
                    else $("#contributors").addClass("d-none");
                });
            </script>

@endsection
