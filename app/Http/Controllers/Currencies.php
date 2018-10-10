<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Currencies extends Controller
{
    public function index()
    {
        if ($currencies = file_get_contents('http://phisix-api3.appspot.com/stocks.json')) {
            $currencies = json_decode($currencies, true)['stock'];

            foreach ($currencies as &$currency) {
                $currency['volume'] = intval($currency['volume']);
                $currency['amount'] = number_format(floatval($currency['price']['amount']), 2);
            }

            return response()->json($currencies, 200);
        }

        return response()->json(['message' => "can't get data from phisix"], 200);
    }
}

