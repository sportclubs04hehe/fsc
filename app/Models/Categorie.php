<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable= ["nameC_en","nameV_vie","status","nguoitao","datetime"];

    public function SubCategory(){
        return $this->belongsToMany(SubCategory::class);
    }
}
