<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'course',
        'due_date',
        'due_time',
        'status',
        'priority',
        'description',
    ];

    protected $casts = [
        'due_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Helper to get clean human-readable due date string matching Figma
     */
    public function getFormattedDueDateAttribute()
    {
        if (!$this->due_date) {
            return 'No due date';
        }

        if ($this->due_date->isToday()) {
            return 'Today' . ($this->due_time ? ', ' . $this->due_time : '');
        }

        if ($this->due_date->isTomorrow()) {
            return 'Tomorrow' . ($this->due_time ? ', ' . $this->due_time : '');
        }

        return $this->due_date->format('M d, Y') . ($this->due_time ? ' • ' . $this->due_time : '');
    }
}
