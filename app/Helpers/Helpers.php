<?php
use \Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

if(! function_exists('upload_base64')){
    function upload_base64($model, $base64, $type = 'default'){
        $folderPath = $type.'/';
        $extension = explode('/', explode(':', substr($base64, 0, strpos($base64, ';')))[1])[1];   // .jpg .png .pdf
        $replace = substr($base64, 0, strpos($base64, ',') + 1);
        $image = str_replace($replace, '', $base64);
        $image = str_replace(' ', '+', $image);
        $image_name = $folderPath . Str::uuid(). '.' . $extension;
        Storage::disk('public')->put($image_name, base64_decode($image), 'public');
        return $image_name;
    }
}

if(! function_exists('switch_connection_to')){
    function switch_connection_to($conn){
        DB::setDefaultConnection($conn);
    }
}
