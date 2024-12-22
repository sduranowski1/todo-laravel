<?php

namespace App\Console\Commands;

use App\Mail\TaskDueNotification;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendTaskDueNotifications extends Command
{
    protected $signature = 'tasks:send-due-notifications';
    protected $description = 'Send emails notifications for tasks due tomorrow';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Get all tasks due tomorrow
        $tasks = Task::whereDate('due_date', Carbon::tomorrow()->toDateString())->get();

        foreach ($tasks as $task) {
            // Send a queued emails notification for each task
            Mail::to('sduranowski1@gmail.com') // Replace with the appropriate user's emails
            ->queue(new TaskDueNotification($task)); // Queue the emails to be sent
        }

        $this->info('Task due notifications have been sent for tomorrow\'s tasks.');
    }
}
