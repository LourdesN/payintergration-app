<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function token(){
        $consumerKey='5oXrVytCB82RM81X39GBJvAJjByOPTAPA70hgUWohTLR6SA5';
        $consumerSecret='hO6RjppAr0I5NYRvwGFbLJfbhZnJcI4e62Je2fACRTekAAJv8n9h8mLNC7R9fARf';
        $url='https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

        $response=HTTP::withBasicAuth($consumerKey,$consumerSecret)->get($url);
        return $response;

    }
    public function initiateSTKPush(){
          $accesstoken=$this->token();
          $url='https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
          $Passkey='bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
          $BusinessShortCode=174379;
          $Timestamp=Carbon::now()->format('Ymdhis');
          $Password=base64_encode($BusinessShortCode.$Passkey.$Timestamp);
          $TransactionType= 'CustomerPayBillOnline';
          $Amount='1';
          $PartyA='254745416760';
          $PartyB=174379;
          $PhoneNumber='254745416760';
          $CallbackUrl='https://jawabumabati.co.ke/';
          $AccountReference='AccountReference';
          $TransactionDesc='TransactionDesc';
          $Remarks='remarks';

          $response=Http::withToken($accesstoken)->post($url,[
            'BusinessShortCode'=>$BusinessShortCode,
            'Password'=>$Password,
            'Timestamp'=>$Timestamp,
            'TransactionType'=>$TransactionType,
            'Amount'=>$Amount,
            'PartyA' => $PartyA,
            'PartyB' => $PartyB,
            'PhoneNumber' => $PhoneNumber,
            'CallBackURL' => $CallbackUrl,
            'AccountReference' => $AccountReference,
            'TransactionDesc' => $TransactionDesc,
        ]);
        return $response;
    }

    public function STKCallback(){
    //
    }
}
