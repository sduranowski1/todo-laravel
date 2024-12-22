<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    use HasFactory;

    // Define the fields that can be mass-assigned
    protected $fillable = [
        'name',        // Task name
        'description', // Task description
        'priority',    // Priority level (low/medium/high)
        'status',      // Status (to-do, in progress, done)
        'due_date',    // Task due date
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
