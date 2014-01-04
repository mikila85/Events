<?php
/**
 * Created by PhpStorm.
 * User: romanraslin
 * Date: 1/4/14
 * Time: 11:21 AM
 */

class UploadController extends BaseController {


    public function image()
    {
        $file = Input::file('logoLink');

        $destinationPath = public_path().'/img/';
        $filename = $file->getClientOriginalName();
        $upload_success = Input::file('logoLink')->move($destinationPath, $filename);

        $finalpath = $destinationPath . $filename;  
        if( $upload_success ) {

            $s3 = AWS::get('s3');
            $respond = $s3->putObject(array(
                'Bucket'     => 'eventu',
                'Key'        => $filename,
                'SourceFile' => $finalpath,
            ));

            unlink($finalpath);
            return $respond->get('ObjectURL');
        } else {
            return Response::json('error', 400);
        }
    }



}