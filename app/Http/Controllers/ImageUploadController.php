<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;


class ImageUploadController extends Controller
{
    /**
     * Undocumented function
     *
     * @param [type] $image
     * @param [type] $width
     * @param [type] $height
     * @param [type] $path
     * @param [type] $name
     * @return void
     */
    public static function imageUpload($image, $width, $height, $path, $name)
    {
        Image::make($image)->fit($width, $height)->save(public_path($path).$name, 100, 'webp');
        return $name;
    }

    public static function unlinkImage($path, $name)
    {
        $image_path = $path.$name;

        if (file_exists($image_path)){
            unlink($image_path);
        }
    }
}
