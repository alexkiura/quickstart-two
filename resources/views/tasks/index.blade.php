@extends('layouts.app')

@section('content')

    <div class="panel-body">
        @include('common.errors')
        <form action="{{ url('task')}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task name -->
            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">Task</label>    
                
                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <!-- Add task button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Current Tasks -->
    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">Current tasks</div>

            <div class="panel-body">
                <table class="table table-striped task-table">
                    <!-- Table headings -->
                    <thead>
                        <th>Task</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!--- Table body -->
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- Task name -->
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>
                                <td>
                                    <!--TODO: Delete button -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        
    @endif
@endsection