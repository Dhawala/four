<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HgController extends Controller
{
    function hourglassSum()
    {
        $d = 1231123123212312321;
        $a = [1, 2, 3, 4, 5,];
        $arr_len = count($a);
        if ($d > $arr_len) {
            $iterations = $d % $arr_len;
            $d = $iterations;
        }
        $top = array_slice($a,0,$d);
        $bottom = array_slice($a,$d);
        $new_arr = array_merge($bottom, $top);
    
        return $new_arr;
    }
}
