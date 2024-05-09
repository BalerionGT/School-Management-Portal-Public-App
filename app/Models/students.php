<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\User;




class students extends Model
{
    use Notifiable;
    use HasFactory;
    protected $fillable = ["id","prénom","nom","email", "password","year", "fillière_id"];

    public function Fillière(){
        return $this->belongsTo(Fillière::class);
    }
    public function user()
{
    return $this->belongsTo(User::class);
}
    public function notifications()
    {
        return $this->morphMany(\App\Models\Notification::class, 'notifiable')->orderBy('created_at', 'desc');
    }

}
