<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable= ["nameC_en","nameV_vie","status"];

    public function Post(){
//        return $this->belongsToMany();
    }
}
