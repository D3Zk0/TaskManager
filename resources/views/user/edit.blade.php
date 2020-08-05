@extends('home')

@section('wrap_content')
    <div id="content">
        <div class="container-fluid mt-3">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit your profile</h1>
            </div>
            <!-- Content Row -->
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <form action="{{route("user.edit.action", $user)}}" method="post">
                                @csrf
                                <div class="row mt-2 no-- align-items-center">
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control" value="{{$user->name}}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" name="email" class="form-control" value="{{$user->email}}" required>
                                    </div>
                                </div>
                                <div class="row mt-2 no-- align-items-center">
                                    <div class="col-md-6">
                                        <input type="password" class="form-control @error('password')
                                            is-invalid
@enderror
                                            " name="password" value="" placeholder="New password:" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control @error('password')
                                            is-invalid
@enderror" name="repeat_password" value=""placeholder="Repeat password:" required>
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
                    if($("#contributors").hasClass("d-none")) $("#contributors").removeClass("d-none");
                    else $("#contributors").addClass("d-none");
                });
            </script>

@endsection
