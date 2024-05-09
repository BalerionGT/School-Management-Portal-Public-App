<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppNotification extends Model
{
    use HasFactory;

    protected $fillable = ['message'];

    // Define any additional columns or relationships specific to your notifications table

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define any additional methods or operations on notifications
    // For example, the markAsRead() method

    public function markAsRead()
    {
        $this->read_at = now();
        $this->save();
    }
}