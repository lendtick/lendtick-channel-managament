<?php

namespace App\Repositories;

use App\Models\ChannelModel as ChannelDB;
use Illuminate\Database\QueryException;

class ChannelRepo{
	
	public function all($columns = array('*')){
		try {
			if($columns == array('*')) return ChannelDB::all();
			else return ChannelDB::select($columns)->get();
		}catch(QueryException $e){
			throw new \Exception($e->getMessage(), 500);
		}
	}

	public function ByConditions($where , $value){
		try {
			return ChannelDB::where($where, $value)->orderBy('id_content', 'desc')->get();
		}catch(QueryException $e){
			throw new \Exception($e->getMessage(), 500);
		}
	}

	public function create(array $data){
		try {
			return ChannelDB::create($data);
		}catch(QueryException $e){
			throw new \Exception($e->getMessage(), 500);
		}
	}

	public function find($column, $value){
		try {
			return ChannelDB::where($column, $value)->first();
		}catch(QueryException $e){
			throw new \Exception($e->getMessage(), 500);
		}
	}

	public function update($id, array $data){
		try { 
			return ChannelDB::where('MsProductId',$id)->update($data);
		}catch(QueryException $e){
			throw new \Exception($e->getMessage(), 500);
		}	
	} 

	public function delete($id){
		try { 
			return ChannelDB::where('MsProductId',$id)->delete();
		}catch(QueryException $e){
			throw new \Exception($e->getMessage(), 500);
		}
		
	}

	public function last(){
		try{
			return ChannelDB::orderBy('Id', 'desc')->first();
		}catch(QueryException $e){
			throw new \Exception($e->getMessage(), 500);
		}
	}
}
