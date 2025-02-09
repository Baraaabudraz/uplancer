<?php

namespace App\Services;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagesUploadService
{
    public function __construct()
    {
    }
public function uploadImage(Request $request,$fileKey,$directory)
{
    if ($request->hasFile($fileKey)) {
    $image = $request->file($fileKey);
    $imageName =time().'_'.uniqid().'.'. $image->getClientOriginalExtension();
    $path = $image->storeAs($directory, $imageName,'public');
    return $path;
    }else{
        return null;
    }
}
public function moveImages(array $uploadedFiles, $destinationFolder)
{
    $savedFiles = [];
    foreach ($uploadedFiles as $fileName) {
        $sourcePath =storage_path('tmp/uploads/'.$fileName);
        if (file_exists($sourcePath)) {
            $newFilePath = Storage::disk('public')->putFileAs($destinationFolder,$sourcePath,$fileName);
            if ($newFilePath) {
                $savedFiles[] = $destinationFolder.'/'.$fileName;
                unlink($sourcePath);
            }
        }
    }
    return $savedFiles;

}

}
