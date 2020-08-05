@extends('layouts.app')

@section('content')
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route("home")}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Shared projects
            </div>
            @foreach($public as $p)
                <li class="nav-item">
                    <a class="nav-link" href="{{route("project.index", $p)}}" >
                        <i class="fas fa-fw fa-cog"></i>
                        <span>{{$p->title}}</span>
                    </a>
                </li>
            @endforeach
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Private projects
            </div>
            @foreach($private as $p)
            <li class="nav-item">
                <a class="nav-link" href="{{route("project.index", $p)}}" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>{{$p->title}}</span>
                </a>
            </li>
            @endforeach
                <hr class="sidebar-divider">
            <div class="sidebar-heading">
                PROJECT
            </div>
            <li class="nav-item cursor-pointer">
                <a class="nav-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Edit project</span>
                </a>
                <div id="collapseTwo" class="collapse hide" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Your projects:</h6>
                        @foreach($projects as $project)
                            <a class="collapse-item" href="{{ route("project.edit", $project) }}">{{$project->title}}</a>
                        @endforeach
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route("project.create")}}" >
                    <i class="fas fa-fw fa-plus-circle"></i>
                    <span>Add project</span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            @yield("wrap_content")


            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright 2020 &copy; DevDex (Andraž Dežman)</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>

@endsection
