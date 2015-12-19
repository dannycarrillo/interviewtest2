@extends('app')

@section('title')
TASKS
@stop

@section('body')
<div class='container'>
    <h1>Tasks</h1>
    <div id="ownform">
        <form id="addForm" method='POST' action='/coalition-test-2/public/task/store'>
            <input hidden name='_token' value='{{csrf_token()}}'>
            <div class='form-group'>
                <label for='name'>Task Name</label>
                <input type='text' name='name' class='form-control'>
            </div>
            <div class='form-group'>
                <label for='priority'>Priority</label>
                <input type='text' name='priority' class='form-control'>
            </div>
            <input type='text' name='date' hidden value="<?php echo date("Y-m-d h:i:s") ?>">
            <input type='submit' value='Create' class='btn btn-primary'>
        </form>
    </div>
    <div id="ownform">
        <ul class="list-group">
            @foreach($tasks as $task)
                <li class="list-group-item"><span class="badge">{{$task->priority}}</span>{{$task->task_name}}</li>
            @endforeach
        </ul>
    </div>
    
    @if(!empty(session('errorBag')))
        @foreach(session('errorBag') as $e)
        <div class="alert alert-danger">
            <strong>Error: </strong> {{$e}}
        </div>
        @endforeach
    @endif
    
</div>
@stop