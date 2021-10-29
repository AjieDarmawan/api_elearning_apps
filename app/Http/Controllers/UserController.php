<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


     function login(){


    }

    function scan_barcode(Request $request){

        error_reporting(0);

          // $url_api = $request = $request->url_api;

            $url = "https://api.edulearning.me/users/barcodelog?cid=ajhyTjJRPT0b93bbf&ccid=a0s1d0wxeTBJbWlGL0dkaytoeXJTeTQwRHhkbDZkQmVCR2hkOG5CTTY3anIveFJleGt4b21yQT0b93bbf";

           // $url = $url_api;
        // $token = "generated token code";

        // $postData = array(
        //      "format"=> "json",
        //      "setdata_mod"=> "mepay",
        //      "formdata_apikey"=> "a7064411215f283732a0ab32394d3db5ae5da1c0",
        //      "formdata_virtual"=> "0029230067"
        // );

        //     $postData = array(
        //      "format"=> "json",
        //      "setdata_mod"=> "mepay",
        //      "formdata_apikey"=> $keycode,
        //      "formdata_virtual"=> $nova,
        // );

      // for sending data as json type
     // $fields = json_encode($postData);

      $ch = curl_init($url);
      curl_setopt(
          $ch,
          CURLOPT_HTTPHEADER,
          array(
              'Content-Type: application/json', // if the content type is json
            //  'bearer: '.$token // if you need token in header
          )
      );
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
      //curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

      $result = curl_exec($ch);
      curl_close($ch);

    //   return $result;

      $output = json_decode($result);

      // echo "<pre>";
      // print_r($output);

      // die;

      $data_hasil = array(
                    'nama' => $output->listdata->comp->nama,
                    'singkatan' =>$output->listdata->comp->singkatan,
                    'strlat' => $output->listdata->comp->strlat,
                    'strlong' => $output->listdata->comp->strlong,
                    'alamat' => $output->listdata->comp->alamat,
                    'website' =>$output->listdata->comp->website,
                    'email' => $output->listdata->comp->email,
                    'telepon' => $output->listdata->comp->telepon,
                    'fax' => $output->listdata->comp->fax,
                    'background' =>  $output->listdata->comp->color->background,#fff
                    'background_app' => $output->listdata->comp->color->background_app,#3f51b5
                    'color_app' => $output->listdata->comp->color->color_app,#7a878e
                    'color_app_sec' => $output->listdata->comp->color->color_app_sec,#b9c3fa
                    'ig' =>  $output->listdata->comp->sosmed->ig,//www.instagram.com/iai_abdullahsaid_batam
                    'yt' =>  $output->listdata->comp->sosmed->yt,//www.youtube.com/channel/UC7p_jCnIosAzetzLkkN1dAA
                    'fb' =>  $output->listdata->comp->sosmed->fb,//www.facebook.com/institutabdullahsaidbatam
                    'tw' =>  $output->listdata->comp->sosmed->tw,//www.facebook.com/institutabdullahsaidbatam
                    'fav' =>  $output->listdata->comp->assets->fav,
                    'logo' =>  $output->listdata->comp->assets->logo,
                    'login' => $output->listdata->comp->assets->login,
                    'header_lg' =>  $output->listdata->comp->assets->header_lg,
                    'header_sm' => $output->listdata->comp->assets->header_sm,
                    'role' => $output->listdata->medata->role,
                   'nimnik' => $output->listdata->medata->nimnik,
                   'jurusan' => $output->listdata->medata->jurusan ,
                   'namapendek' => $output->listdata->medata->namapendek ,
                   'namalengkap' =>  $output->listdata->medata->namalengkap ,
      );

      if($data_hasil){
          return $data_hasil;
      }else{

          $data_hasil = array(
            "nama"=> "",
            "singkatan"=> "FTI Jayabaya",
            "strlat"=> 0,
            "strlong"=> 0,
            "alamat"=> "Jalan Raya Bogor KM. 28,8, Cimanggis, Pasarrebo, Pekayon, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13210",
            "website"=> "www.ftijayabaya.ac.id",
            "email"=> "info@ftijayabaya.ac.id",
            "telepon"=> "021-877665542",
            "fax"=> "021-877665542",
            "background"=> "#fff",
            "background_app"=> "#3f51b5",
            "color_app"=> "#7a878e",
            "color_app_sec"=> "#b9c3fa",
            "ig"=> "//www.instagram.com/iai_abdullahsaid_batam",
            "yt"=> "//www.youtube.com/channel/UC7p_jCnIosAzetzLkkN1dAA",
            "fb"=> "//www.facebook.com/institutabdullahsaidbatam",
            "tw"=> "//www.facebook.com/institutabdullahsaidbatam",
            "fav"=> "https=>//dev-file.edulearning.me/assets/fav",
            "logo"=> "https=>//dev-file.edulearning.me/assets/logo",
            "login"=> "https=>//dev-file.edulearning.me/assets/login",
            "header_lg"=> "https=>//dev-file.edulearning.me/assets/logo-header-lg",
            "header_sm"=> "https=>//dev-file.edulearning.me/assets/logo-header-sm",
            "role"=> "M2c9PQb93bbfb93bbf",
            "nimnik"=> "mhs001",
            "jurusan"=> "61201",
            "namapendek"=> null,
            "namalengkap"=> "Mahasiswa 001"
          );

          echo json_encode($data_hasil);


      }




    }
}
