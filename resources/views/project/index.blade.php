@extends('home')

@section('wrap_content')
    <div id="content">
        <div class="container-fluid mt-3">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">{{$project->title}} <i class="fa fa-fw fa-arrow-right"></i> Tasks</h1>
            </div>
            <!-- Content Row -->
            <div class="form-group">
                <div class="row mt-1">
                    <div class="col-md-1 m-auto">&nbsp;</div>
                    <div class="col-md-3 m-auto text-center font-weight-bolder">TITLE</div>
                    <div class="col-md-5 m-auto text-center font-weight-bolder">DESCRIPTION</div>
                    <div class="col-md-2 m-auto text-center font-weight-bolder">DUE</div>
                    <div class="col-md-1 m-auto text-center">&nbsp;</div>
                </div>
                <hr>
                @foreach($tasks as $task)
                <div class="row mt-1" >
                    <div class="col-md-1 m-auto"> <button class="profile-badge" disabled style="background-color: {{$task->user->color}};" > {{$task->user->getChars()}}</button></div>
                    <div class="col-md-3 m-auto font-weight-bolder">{{$task->title}}</div>
                    <div class="col-md-5 m-auto">{{$task->description}}</div>
                    <div class="col-md-2 m-auto ">{{date_format(new DateTime($task->expiry), "d.m.Y")}}</div>
                    <div class="col-md-1 m-auto">
                        <button class="btn  text-danger delete-task" id="{{$task->id}}" ><i class="fa fa-fw fa-times"></i></button></div>
                </div>
                @endforeach
                <hr>
                <div class="row mt-1">
                    <div class="col-md-2">
                        <select name="assign" id="assign" class="form-control">
                            <option value="" disabled selected hidden>Assign to</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 m-auto font-weight-bolder"><input type="text" class="form-control" id="title" name="title" placeholder="Task title"></div>
                    <div class="col-md-4 m-auto"><input type="text" class="form-control" id="description" name="description" placeholder="Task description...."></div>
                    <div class="col-md-2 m-auto "><input type="date" class="form-control" id="due" name="due"></div>
                    <div class="col-md-1 m-auto "><button class="profile-badge bg-success" id="add_task"> <i class="fa fa-fw fa-save"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script >


        $("#add_task").click(addTask);
        $(".delete-task").on("click",function () {
            deleteTask($(this).attr("id"))
        });

        function addTask() {
            $.ajax({
                url: "{{ route("task.store")  }}",
                method: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    project : "{{$project->id}}",
                    assign : $("#assign").val(),
                    title : $("#title").val(),
                    description : $("#description").val(),
                    due : $("#due").val(),
                },
                dataType: 'json',
                success: function (data) {
                    window.location.reload();
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
        function deleteTask(id) {
            $.ajax({
                url: "{{ route("task.delete")  }}",
                method: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id : id,
                },
                dataType: 'json',
                success: function (data) {
                    window.location.reload();
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
    </script>

@endsection
