<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $fillable = ['id','nom_module', 'year' ,'semestre'	,'description'];

    
    public function Fillière(){
        return $this->belongsToMany('App\Models\Fillière', 'fillières_modules' ,'module_id', 'fillière_id');
    }

    public function elements()
    {
        return $this->hasMany(Element::class);
    }
}
