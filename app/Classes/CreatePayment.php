<?php

namespace App\Classes;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;

class CreatePayment {

	public function newOxenPayment($id) {

		// Set RPC
		$oxenRPC = 'http://oxenrpc:12388/json_rpc';

        // Get price
        $coinGecko = new CoinGeckoClient();
        $getOxenPrice = $coinGecko->simple()->getPrice('loki-network', 'cad');
        $price = round(60/$getOxenPrice['loki-network']['cad'], 2); 

        // Create address
        $address = Http::post($oxenRPC, [
            'id' => '0',
            'method' => 'create_address',
            'params' => ['account_index' => 0]
        ])["result"]["address"];

        // Get index ID
	    $index_id = Http::post($oxenRPC, [
	        'id' => 0,
	        'method' => "get_address_index",
	        'params' => [
	            'address' => $address,
	        ]
	    ])["result"]["index"]["minor"];

        // Get URI
        $oxenURI = Http::post($oxenRPC, [
            'id' => '0',
            'method' => 'make_uri',
            'params' => [
                'address' => $address,
                'amount' => 1000000000*$price,
                'tx_description' => '12 months subscription.',
                'recipient_name' => 'Privacyroot'
            ]
        ])["result"]["uri"];

        // Add payment to db
        $payment = new Payment;
        $payment->oxen_payment_id = $address;
        $payment->oxen_index_id = $index_id;
        $payment->oxen_payment_uri = $oxenURI;
        $payment->user_id = $id;
        $payment->payment_amount = $price;
        $payment->save();

        // Set account status to waiting
        $user = User::find($id);            
        if ($user->account_status == 'created') {
        	$user->account_status = 'waiting';
        	$user->save();
        }
	}
}