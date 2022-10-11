<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $table="subcategory";
    protected $fillable=["subC_en","subV_vie","nguoitao","datetime","category_id","status"];

    public function Categories(){
        return $this->hasOne(Categorie::class);
    }
}
