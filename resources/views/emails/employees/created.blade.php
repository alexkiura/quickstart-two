@extends('layouts.app')

@section('content')

<div class="panel-body">
    <p><strong>New Task added</strong></p>
    <p>{{ $task->name }}</p>
</div>