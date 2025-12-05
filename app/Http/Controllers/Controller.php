<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function uploadImage($image, $path)
    {
        $file = $image;
        $ext = $file -> getClientOriginalExtension();
        $filename = time(). '.'. $ext;
        $file->move('public/assets/uploads/'.$path.'/',$filename);

        return $filename;
    }

    public function deleteUploadImage($image, $link)
    {
        $path = "assets/uploads/$link/$image";
        if(File::exists($path)){
            File::delete($path);
        }
        $file = $image;
        $ext = $file -> getClientOriginalExtension();
        $filename = time(). '.'. $ext;
        $file->move('public/assets/uploads/'. $link . '/',$filename);

        return $filename;
    }

    public  function deleteImage($image, $link)
    {
        $path = "public/assets/uploads/$link/$image";
        if(File::exists($path))
        {
            File::delete($path);
        }
    }
}
