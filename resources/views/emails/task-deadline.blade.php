<!DOCTYPE html>
<html>
    <head>
        <title>Task deadline</title>
    </head>
    <body>
        <h2>
            Hello, {{ $data['user_name'] }}!
        </h2>
        <p>
            Your task has been deadline at tomorrow: {{$data['deadline']}}
        </p>
        <p>
            Task name: {{ $data['task_name'] }}
        </p>
        <p>
            <a href="{{ $data['url'] }}">Link to task</a>
        </p>
    </body>
</html>
