<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 12/9/2016
 * Time: 8:18 PM
 */

namespace App\Services;

use Carbon\Carbon;

class Uploader
{

    public function upload ($fileObject , $filePath)
    {

        if ($fileObject) {

            $newFileName = md5($fileObject->getClientOriginalName()) . Carbon::now()->timestamp . '.' . $fileObject->getClientOriginalExtension();

            $fileObject->move(public_path($filePath) , $newFileName);

            return $newFileName;

        }

        return null;

    }

    public function uploadMultipleFile ($fileObject ,$filePath ) {

        $names = [];

        if ($fileObject[0]) {

            foreach($fileObject as $file) {

                $newFileName = md5($file->getClientOriginalName()) . Carbon::now()->timestamp . '.' . $file->getClientOriginalExtension();

                $file->move(public_path($filePath) , $newFileName);

                $names[] = $newFileName;

            }

            return $names;

        }


        return null;

    }

}