@extends('home')

@section('wrap_content')
    <div id="content">
        <div class="container-fluid mt-3">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Add project</h1>
            </div>
            <!-- Content Row -->
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <form action="{{route("project.store")}}" method="post">
                                 @csrf
                                <div class="row no-- align-items-center">
                                    <div class="col mr-2">
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Title" name="title"  required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-- align-items-center">
                                        <div class="col-md-6">
                                            <input type="radio" id="private" name="type" value="private" checked required>
                                            <label for="private">Private</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="radio" id="public" name="type" value="public" required>
                                            <label for="public">Public</label>
                                        </div>
                                </div>
                                <div class="row no-- align-items-center d-none " id="contributors">
                                    <div class="col-md-12">
                                        <label for="users">Share to:</label>
                                        <select class="form-control" name="users[]" id="users" multiple>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-2 no-- align-items-center">
                                    <div class="col-md-12">
                                        <button class="btn btn-block btn-success">Add</button>
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
