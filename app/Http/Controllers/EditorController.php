<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class EditorController extends Controller
{
    public function upload(Request $request){
        $validator = Validator::make($request->all(), [
            'upload' => 'image|mimes:jpg,bmp,png,jpeg,gif,webp|max:10240'
        ]);
        if($validator->fails()){
            return array(
                'fileName'=>'',
                'location' => ''
            );
        }
        $file = $request->upload!=null?$request->upload:$request->file;
        $folderPath = public_path("uploads/editor/images/");
        if(!File::isDirectory($folderPath)){
            File::makeDirectory($folderPath, 0777, true, true);
        }
        $file_name = auth()->user()->id.now()->timestamp.rand(1000000,9999999).'.webp';
        /* if($this->gd_extension){
            $imgFile = Image::make($file);
            $imgFile->orientate()->resize(800, 800, function ($constraint) {
                $constraint->aspectRatio();
            })->save($folderPath.$file_name);
        }else{
            $file->move($folderPath, $file_name);
        } */
        $file->move($folderPath, $file_name);
        return array(
            'fileName'=>$file_name,
            'location' => asset("uploads/editor/images/".$file_name)
        );
    }
}
