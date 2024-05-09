<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;
    protected $fillable = ["id" ,"prenom","nom","email", "password", "chef"];

    public function elements()
    {
        return $this->hasMany(Element::class);
    }
        public function user()
    {
        return $this->belongsTo(User::class);
    }

}
