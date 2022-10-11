<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\SubCategory;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable= ["nameC_en","nameV_vie","status","nguoitao","datetime","ngaytao"];

    public function danhmuccon(){
        return $this->hasMany(SubCategory::class);
    }
}
