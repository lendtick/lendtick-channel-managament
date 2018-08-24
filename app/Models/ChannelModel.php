<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChannelModel extends Model {

    protected $table = 'channel.master_channel';

    protected $fillable = [
        'id_channel',
        'name_channel',
        'path_image_channel'
    ];
    
    public $timestamps = false;

}
