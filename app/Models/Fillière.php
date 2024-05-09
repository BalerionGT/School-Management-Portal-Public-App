<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fillière extends Model
{
    use HasFactory;
    protected $fillable = ['id','nom'];
    
    public function students(){
        return $this->hasMany(students::class);
    }

    public function Module(){
        return $this->belongsToMany('App\Models\Module', 'fillières_modules' ,'module_id', 'fillière_id');
    }

    public function chef() {
        return $this->belongsTo(Chef::class);
    }
}
