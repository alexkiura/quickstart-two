<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="jumbotron">
            <h1>New Task added</h1>
            <p>{{ $task->name }}</p>
            <a href="{{ url('/tasks') }}" class="btn btn-primary btn-lg" role="button">See Tasks</a>
        </div>
        
    </body>
</html>