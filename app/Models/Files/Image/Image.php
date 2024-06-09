<?php

namespace App\Models\Files\Image;

use App\Models\RoyalBoardModel\RoyalBoardModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RoyalSettings;

class Image extends RoyalBoardModel
{
    protected $table="image";

    use HasFactory;

    function secretRemoving()
    {
        $imagePath='/'.RoyalSettings::$imagesUploadPath.'/'.$this->path;
        $path=public_path().$imagePath;
        if(is_file($path))if(unlink($path))if($this->delete())return true;
        return false;
    }

}
