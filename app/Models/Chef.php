<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    use HasFactory;
    protected $fillable = ["id" ,"prénom","nom","email", "password", "fillière"];

    public function filière() {
        return $this->hasOne(Fillière::class);
    }
}
