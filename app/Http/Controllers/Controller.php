<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


// arafat Helper Functions
/**
 * add by arafat.dml@gmail.com
 * get_valid_time_limit
 * @return foreever or a date range
 */

function get_valid_time_limit($request){
    $valid_time_limit = "forever";
    if(isset($request->valid_date_range)){

        // check if it is forever return it
        if($request->valid_date_range == "forever"){
            return $valid_time_limit;
        }

        $two_dates = explode("-", $request->valid_date_range);
        foreach ($two_dates as $k => $date) {
            $two_dates[$k] = date("Y-m-d", strtotime($date));
        }
        $valid_time_limit = $two_dates[0]." to ".$two_dates[1];
        // dump(explode(" to ", $valid_time_limit));
    }

    return $valid_time_limit;
}


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
