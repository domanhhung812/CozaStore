<?php 

namespace App\Services;
use Illuminate\Http\Request;


class ProcessViewService{

    public static function view( $table, $column, $key, $id){
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress; 
        $timeNow = time();

        $throttleTime = 60*60;
        $key = $key .'-'.md5($ipaddress) .'_'. $id;
        if(\Session::exists($key)){
            $timeBefore = \Session::get($key);
            if($timeBefore + $throttleTime > $timeNow){
                return false;
            }
        }
        \Session::put($key, $timeNow);
        \DB::table($table)->where('id',$id)
                          ->increment($column);
    }
}