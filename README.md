
Todo Laravel App
================

A simple task management application built with Laravel. This application allows users to create, update, delete, and filter tasks. Additionally, email notifications are sent for tasks that are due the next day.

Features
--------

*   **Task Management**: Create, update, delete, and view tasks.
*   **Task Filtering**: Filter tasks by priority, status, and due date.
*   **Email Notifications**: Send email notifications for tasks due tomorrow using Laravel queues and scheduler.
*   **Responsive UI**: Built with Blade templates and styled with Tailwind CSS (or other frameworks as applicable).

Requirements
------------

*   PHP 8.4 or higher
*   Composer
*   MySQL or compatible database
*   Laravel 11.35.1
*   Docker (optional, for containerized environment)

Installation
------------

### Step 1: Clone the repository

bash

Copy code

`git clone https://github.com/sduranowski1/todo-laravel cd todo-laravel`

### Step 2: Set up the environment

Copy the `.env.example` file to `.env`:

bash

Copy code

`cp .env.example .env`

### Step 3: Install dependencies

Run Composer to install the dependencies:

bash

Copy code

`composer install`

### Step 4: Set up your database

*   Create a MySQL database and update your `.env` file with the correct database credentials:

env


*   Run the migrations:

bash

Copy code

`php artisan migrate`

### Step 5: Set up the mailer

Make sure your `.env` contains the correct mailer settings:

env


### Step 6: (Optional) Docker Setup

If you prefer to run the app in Docker, make sure you have Docker Desktop installed and configured. Then, use the following commands to set up the environment:

bash

Copy code

`docker-compose up --build`

This will start the web server, database, and other necessary services in containers.

### Step 7: Run the scheduler (for email notifications)

You can set up a cron job to run Laravel’s scheduler every minute. Add the following to your crontab:

bash

Copy code

`* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1`

Alternatively, you can run the scheduler manually for testing:

bash

Copy code

`php artisan schedule:run`

### Step 8: Start the queue worker (if using queues)

If you are using queues for email notifications, start the queue worker:

bash

Copy code

`php artisan queue:work`

Usage
-----

### Task Management

*   **Create Task**: Go to `/tasks/create` and fill out the task form with the task name, description, priority, status, and due date.
*   **Edit Task**: Go to `/tasks/{id}/edit` to modify an existing task.
*   **Delete Task**: On the task detail page, you can delete the task.
*   **View Task**: Go to `/tasks/{id}` to view a single task.

### Task Filtering

You can filter tasks by:

*   **Priority**: `low`, `medium`, `high`
*   **Status**: `to-do`, `in progress`, `done`
*   **Due Date**: Specific due date (e.g., `2024-12-22`)

To apply filters, use query parameters:

text

Copy code

`/tasks?priority=high&status=to-do&due_date=2024-12-22`

Development
-----------

*   **Run Development Server**: You can run the Laravel development server with:

bash

Copy code

`php artisan serve`

This will start the application at `http://127.0.0.1:8000`.

*   **Testing**: Laravel uses PHPUnit for testing. Run the following command to run all tests:

bash

Copy code

`php artisan test`

Docker Setup
------------

If you prefer a containerized environment, you can use Docker to build and run the app:

1.  Make sure Docker is installed.
2.  Build and start the containers:

bash

Copy code

`docker-compose up --build`

3.  Access the application at `http://localhost` or whichever port you’ve set in your `docker-compose.yml`.

Contribution
------------

Feel free to fork this repository and submit pull requests for improvements or bug fixes.

To contribute:

1.  Fork the repo
2.  Create a new branch (`git checkout -b feature-name`)
3.  Commit your changes (`git commit -am 'Add feature'`)
4.  Push to the branch (`git push origin feature-name`)
5.  Create a new pull request

License
-------

This project is licensed under the MIT License - see the LICENSE file for details.

* * *

Feel free to modify this `README.md` file according to your actual project details and preferences!