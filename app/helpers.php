<?php

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

function active($routeNames){
    $class = "";
    if(is_array($routeNames)):
        foreach($routeNames as $routeName):
           if(setActive($routeName)):
                $class = "menu-item-active active";
                break;
           endif;
        endforeach;
    else:
        if(setActive($routeNames)):
            $class = "menu-item-active active";
        endif;
    endif;
   return $class;
}
function setActive($routeName){
    return request()->routeIs($routeName);
}
function imageManager($url, $width, $model){
    $imageOptimized = ImageManagerStatic::make(Storage::get($url))->widen($width)->encode('webp');
    $urlEncode = $url.'.webp';
    Storage::put($url, (string) $imageOptimized);
    Storage::move($url, $urlEncode);
    if($model->image):
        if(Storage::exists($model->image->url)):
            Storage::delete($model->image->url);
        endif;
        $model->image()->update([
            'url' => $urlEncode,
        ]);
    else:
        $model->image()->create([
            'url' => $urlEncode,
            'main' => true,
        ]);
    endif;
}