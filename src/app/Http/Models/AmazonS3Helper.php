<?php

namespace daxter1987\AmazonS3Helper;

use Aws\S3\S3Client;

class AmazonS3Helper{
    public static function UploadtoS3($file_contents, $name, $file_type){
        $s3 = S3Client::factory(
            array(
                'credentials' => array(
                    'key' => env('AWS_ACCESS_KEY_ID'),
                    'secret' => env('AWS_SECRET_ACCESS_KEY')
                ),
                'version' => 'latest',
                'region'  => env('AWS_DEFAULT_REGION')
            )
        );

        $result_s3 = $s3->putObject([
            'Key' => $name,
            'ACL' => 'public-read',
            'Body' => $file_contents,
            'Bucket' => env('AWS_BUCKET'),
            'ContentType' => $file_type
        ]);

        return $result_s3->get('ObjectURL');
    }
}
