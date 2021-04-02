<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockController extends Controller
{
    function sockMerchant() {

        $n = 7;//use as a counter ??
        $ar = [1,2,1,2,1,3,2];
        $count_by_color = [];
        $tot = [
            'pairs'=>0,
            'stray'=>0,
        ];
        
        //count by each colour
        foreach($ar as $a){
            if(!array_key_exists($a,$count_by_color)){
                $count_by_color[$a] = 1;
            }
            else{
                $count_by_color[$a]++;
            }    
        }
        
        //count total number of pairs 
        foreach($count_by_color as $each_color){
               $tot['pairs'] +=  round($each_color/2,0,PHP_ROUND_HALF_DOWN);
               $tot['stray'] +=  $each_color%2;
        }

        return $tot['pairs'];
    }
    
}
