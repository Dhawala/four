<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VallyController extends Controller
{
    public function countingValleys()
    {
        $steps = 8;
        $path = ['D', 'D', 'U', 'U', 'U', 'U', 'D', 'D','D', 'D','D', 'U', 'U','U',];

        $displacement = 0;
        $vally_count = 0;
        $mountain_count = 0;

        foreach ($path as $k => $step) {

            if ($step == 'D') {
                $displacement--;
            }

            if ($step == 'U') {
                $displacement++;
            }

            if ($k != 0) {
                if ($displacement == 0 && $step == 'U') {
                    $vally_count++;
                }
                if ($displacement == 0 && $step == 'D') {
                    $mountain_count++;
                }
            }
        }
        return $vally_count;
    }

}
