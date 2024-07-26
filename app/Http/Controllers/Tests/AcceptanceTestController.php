<?php

namespace App\Http\Controllers\Tests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AcceptanceTestController extends Controller
{
    /**
     * Return sumatory
     *
     * @return int
     */
    public function sum(int $num1, int $num2)
    {
        return $num1+$num2;
    }
}
