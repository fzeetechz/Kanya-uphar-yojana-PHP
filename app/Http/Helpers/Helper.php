<?php

use App\Models\{Notification};
function upload($image, $folderName){
  try{
    if (!empty($image) && $folderName !='' ) {
        $modulePath= Module::find('Admin')=='Admin' ? 'admin' : 'front';
        $path = public_path()."/$modulePath".'/images';
        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
        $imageName = rand().'.'.$image->extension(); 
        $image->move(("$path/".$folderName),$imageName);
        return $imageName;
      }
    }
  catch(Exception $e){
    throw $e;
  }
}

function getFile($folderName,$image,$modulePath='admin'){
  return $path = asset($modulePath."/images/".$folderName."/".$image);
}

function GetNotifications(){
  return  $result1 = Notification::orderBy('id', 'DESC')->where('status','0')->whereIn('type',['Order','Booking','Membership','NewCutomer','NewBeautician'])->get();  
}


         