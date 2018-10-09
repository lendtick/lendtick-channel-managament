<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\RestCurl;
use App\Helpers\Api; 

use App\Repositories\ChannelRepo;
use DB;


class ChannelDataController  extends Controller
{ 

    public function __construct(ChannelRepo $ChannelRepo)
    {
        $this->ChannelRepo = $ChannelRepo;
    }
    

    public function index(){ 
        $json = array(
            'id' => sha1(time()), 
            'desc' => array(
                "lang" => "id",
                "val" => "Product ganteng untuk kamu yang tampan"
            ),
            "name" => "Camera Bigo Live",
            "category" => "Peralatan Tampan", // plain text
            "brand" => array(
                "img" => array(
                    "src" => "http =>//i.sears.com/s/i/bl/image/spin_prod_metadata_168138610"
                ),
                "name" => "Bigo"
            ),
            "price" => array(
                        "base_price"  => "1000000", // harga dari commercenya
                    ),
            "assets" => array(
                "imgs" => array(
                    array(
                        "img" => array(
                                    "height" => "1900", // ukuran gambar di set pas nanti dari sync product
                                    "src" => "http =>//c.shld.net/rpx/i/s/i/spin/image/spin_prod_967112812",
                                    "width" => "1900"
                                )
                    ),
                    array(
                        "img" => array(
                            "height" => "1900",
                            "src" => "http =>//c.shld.net/rpx/i/s/i/spin/image/spin_prod_945877912",
                            "width" => "1900"
                        )
                    ),
                    array(
                        "img" => array(
                            "height" => "1900",
                            "src" => "http =>//c.shld.net/rpx/i/s/i/spin/image/spin_prod_945878012",
                            "width" => "1900"
                        )
                    )
                )
            ),
            "shipping" => array(
                "dimensions" => array(
                    "height" => "13.0",
                    "length" => "1.8",
                    "width" => "26.8"
                ),
                "weight" => "1.75"
            ),
            "channel" => array(
                "channel_id" => "CHN0001",
                "channel_name" => "JD.ID",
                "channel_image" => "https =>//upload.wikimedia.org/wikipedia/commons/1/17/Jdid.png",       
                "channel_product_id" => "80haudn9u1w10202"
            ),
            "attrs" => array(
                array(
                    "name" => "warna",
                    "value" => "hitam"
                ),
                array(
                    "name" => "ukuran lensa",
                    "value" => "24 MP"
                ),
                array(
                    "name" => "Layar",
                    "value" => "Touch Screen"
                )
            ),
            "lastUpdated" => time() 
                //format time musti convert sebelum nanti tampil ke front end
        );

        $users = DB::connection('mongodb')->collection('sync')->insert($json);

        if ($users) {
            echo 'berhasil';
        } 
    }

    /// get data sync 
     public function DataSync(){  
        try{
            $status   = 1;
            $httpcode = 200;
            $data     = DB::connection('mongodb')->collection('sync')->get();
            $errorMsg = null;
        }catch(\Exception $e){
            $status   = 0;
            $httpcode = 400;
            $data     = null;
            $errorMsg = $e->getMessage();
        }
        return response()->json(Api::format($status, $data, $errorMsg), $httpcode);
    } 

}
