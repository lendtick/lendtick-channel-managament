<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\RestCurl;
use App\Helpers\Api; 

use App\Repositories\ChannelRepo;


class ChannelController  extends Controller
{ 

    public function __construct(ChannelRepo $ChannelRepo)
    {
        $this->ChannelRepo = $ChannelRepo;
    }
    

    public function index(){
        // print_r()
        phpinfo();
        // try{
        //     $status   = 1;
        //     $httpcode = 200;
        //     $data     = $this->ChannelRepo->all();
        //     $errorMsg = null;
        // }catch(\Exception $e){
        //     $status   = 0;
        //     $httpcode = 400;
        //     $data     = null;
        //     $errorMsg = $e->getMessage();
        // }
        // return response()->json(Api::format($status, $data, $errorMsg), $httpcode);
    } 

}
