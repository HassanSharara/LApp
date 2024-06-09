<?php

namespace App\Models\System\Category;

use App\Models\RoyalBoardModel\RoyalBoardModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends RoyalBoardModel
{
    protected $table="category";
    protected $hasImage=true;
    protected $RCH=['childs'];
    use HasFactory;


    function childs(){
        return $this->hasMany(Category::class,'father_id')->with('images')->orderBy('t','DESC');
    }

    function subCategories()
    {
    return $this->hasMany(Category::class,'father_id')->
    whereHas('childs')->
    orderBy('t','DESC')->with(['images','childs']);

    }

    function subCategoriesWhereHasSections()
    {

    return $this->hasMany(Category::class,'father_model')->
    whereHas('sections')->
    orderBy('t','DESC')->with('images');

    }
}
