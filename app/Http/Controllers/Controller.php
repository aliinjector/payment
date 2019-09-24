<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected function uploadFile($file, $watermark = true, $resize = true)
    {


        if (\App::environment('local')) {
            $folder = public_path();
        }
        if (\App::environment('production')) {
            $folder = public_path() . '_html';
        }

        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $day = Carbon::now()->day;
        $filePath = "/storage/upload/{$year}/{$month}/{$day}/";
        $fileName = time() . "_" . $file->getClientOriginalName();
        $file->move($folder . $filePath, $fileName);
        $file = "$filePath" . "$fileName";
        $imageMimeTypes = ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/svg+xml'];
        $contentType = mime_content_type(ltrim($file, "/"));
        if ($watermark == true && in_array($contentType, $imageMimeTypes)) {
            $this->watermark($file);
        }
        if ($resize == true && in_array($contentType, $imageMimeTypes)) {
            $sizes = ["80" => "80", "400" => "400", "250" => "250", "200" => "175", "200" => "100", "410" => "270", "120" => "50", "16" => "16"];
            return $url['images'] = $this->resize($file, $sizes, $filePath, $fileName);
        } else {
            return $file;
        }
    }
    private function resize($path, $sizes, $filePath, $fileName)
    {
        if (\App::environment('local')) {
            $folder = public_path();
        }
        if (\App::environment('production')) {
            $folder = public_path() . '_html';
        }

        $images['original'] = $filePath . $fileName;
        foreach ($sizes as $width => $height) {
            $size = $width . ',' . $height;
            $images[$size] = $filePath . "{$size}_" . $fileName;
            \Image::make($folder . $path)->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            })->save($folder . $images[$size]);
        }
        return $images;
    }
    protected function fa_num_to_en($string)
    {
        $persian1 = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        $persian2 = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
        $num = range(0, 9);
        $string = str_replace($persian1, $num, $string);
        return str_replace($persian2, $num, $string);
    }




}
