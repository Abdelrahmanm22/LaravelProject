<?php

namespace App\Traits;
trait image{



    function saveImage($photo,$folderPath){
        $avatar_file_extension = $photo->getClientOriginalExtension();
        $avatar_file_name = time().'.'.$avatar_file_extension;
        $avatar_path = $folderPath;
        $photo->move($avatar_path,$avatar_file_name);
        return $avatar_file_name;
    }
}





?>