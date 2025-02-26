<?php

namespace App\Http\Controllers;
use App\Models\Aqiqah;
use App\Models\Theme;
use App\Models\Wedding;
use App\Models\Confirmationkhitan;
use App\Models\Page;
use App\Models\User;
use App\Models\Pendingpayment;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class MidtransController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      

      public function make($idtransaction,$nilai) {
         $curl = curl_init();
         // $timestamp = time();
         // $result = $this->checkToken($idtransaction);
         
         // $key = $result['key'];
         // $cektoken = $result['token'];
         $cektoken="kosong";

         if($cektoken == "kosong"){
            $transaction_data = array(
                  "transaction_details" => array(
                     "order_id" => $idtransaction,
                     "gross_amount" => $nilai
                  ),
                  "credit_card" => array(
                     "secure" => true
                  )
            );

            $payload = json_encode($transaction_data);

            curl_setopt_array($curl, array(
                  CURLOPT_URL => 'https://app.midtrans.com/snap/v1/transactions',
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => '',
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 0,
                  CURLOPT_FOLLOWLOCATION => true,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => 'POST',
                  CURLOPT_POSTFIELDS => $payload,
                  CURLOPT_HTTPHEADER => array(
                     'Accept: application/json',
                     'Content-Type: application/json',
                     'Authorization: Basic TWlkLXNlcnZlci1CaENaVFBfeXBLWVJ6cHFhM01qb1piaDM6'
                  ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            // Mengonversi string JSON menjadi objek JSON menggunakan json_decode
            $midtransResponse = json_decode($response);

            // Post token ke database
            // $this->postToken($key, $midtransResponse->token);

            return view('midtrans', ['token' => $midtransResponse->token, 'idtransaction' => $idtransaction]);
         } else {
            // Return the response as JSON "Token already exists: " . 
            return view('midtrans', ['token' => $cektoken, 'idtransaction' => $idtransaction]);
         }
      }

      
      public function sukses($id){
         Pendingpayment::all()->where('id_invitation', $id)->first()->delete();
         return redirect("/invitation-wedding/$id/namatamu");
      }

      // account
      // user:004
      // pass:Fian...

}

