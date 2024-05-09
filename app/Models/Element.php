<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    use HasFactory;
    protected $fillable = ["id" ,"nom_elt","semestre" ,"période", "description" ,"module_id"];
    
    public function professeur()
    {
        return $this->belongsTo(Professor::class);
    }
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
