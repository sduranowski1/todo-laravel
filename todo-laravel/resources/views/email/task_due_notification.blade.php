<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Due Tomorrow</title>
</head>
<body>
<h1>Task Due Tomorrow</h1>
<p>Hello,</p>
<p>This is a reminder that the task <strong>{{ $task->name }}</strong> is due tomorrow, on <strong>{{ \Carbon\Carbon::parse($task->due_date)->format('d M Y') }}</strong>.</p>
<p>Don't forget to complete it!</p>
<p>Best regards,<br>The Task Manager Team</p>
</body>
</html>
