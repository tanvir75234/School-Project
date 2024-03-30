<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model{
    use HasFactory;


    public function categoryInfo(){
        return $this->belongsTo('App\Models\ProjectCategory','procate_id','procate_id');
    }

}