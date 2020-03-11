<?php

namespace App\Custom;
use Illuminate\Support\Facades\Storage as Cloud;

class Storage {

    /*
     *  GET Avatar for the user from storage cloud
     */
    static public function url($imgname, $for = 'users'){
        $image = null ;
        switch (env('FILESYSTEM_DRIVER')){
            case 'dropbox':
                $image = Cloud::disk('dropbox')->getDriver()
                    ->getAdapter()
                    ->getClient()
                    ->getTemporaryLink("public/images/$for/$imgname");
                break;
            case 'local':
                $image = Cloud::disk("local")->url("images/$for/$imgname");
                break;
        }

        return $image;

    }

}
