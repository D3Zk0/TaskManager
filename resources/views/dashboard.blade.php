@extends('home')

@section('wrap_content')
    <div id="content">
        <div class="container-fluid mt-3">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">All projects</h1>
            </div>
            <!-- Content Row -->
            <div class="row">
                @foreach($projects as $project)

                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="{{route("project.index", $project)}}" class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-- align-items-center">
                                <div class="col mr-2">
                                    <div class=" font-weight-bold text-primary text-uppercase mb-1">{{$project->title}}</div>
                                    <div class=" text-xs font-weight-bold text-primary text-uppercase mb-1">Pending tasks:{{$project->tasks()->count()}}</div>
                                </div>
                                <div class="col-auto">
                                    <span class="profile-badge" style="background-color: {{$project->users()->first()->color}};">{{$project->users()->first()->getChars()}}</span>
                                </div>
                            </div>
                        </div>
                    </a>

                </div>
                    @endforeach
            </div>

            <!-- Content Row -->



            <!-- Content Row -->
            <div class="row"></div>

        </div>
        <!-- /.container-fluid -->

    </div>

@endsection
