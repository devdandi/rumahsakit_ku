<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIPaymentGateway extends Controller
{
    protected $path = '/v1/inquiry/888801000157508';
    protected $verb = 'GET';
    protected $token_barier = '';
    protected $key_client = 'OsLgmc1iRu9BH5FM4cG2OALYGILsxTck';
    protected $private_key = 'nAiFLQRlGYCNrs2v';
    public function index()
    {

    }

    public function _initTOKENBRI()
    {
        
        $url ="https://partner.api.bri.co.id/oauth/client_credential/accesstoken?grant_type=client_credentials";
        $data = "client_id=".$this->key_client."&client_secret=".$this->private_key."";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  //for updating we have to use PUT method.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        // dd($result);

        $json = json_decode($result, true);
        $accesstoken = $json['access_token'];
        // $NoRek = "037701000692301";
        $NoRek = "888801000157508";
        $secret = $this->private_key;
        $timestamp = gmdate("Y-m-d\TH:i:s.000\Z");
        $token = $accesstoken;
        $path = "/v2/inquiry/".$NoRek;
        $verb = "GET";
        $body="";

        $payloads = "path=$path&verb=$verb&token=Bearer $token&timestamp=$timestamp&body=";
        $signPayload = hash_hmac('sha256', $payloads, $secret, true);

        $base64sign = base64_encode($signPayload);

        $urlGet ="https://partner.api.bri.co.id/v2/inquiry/".$NoRek;
        $chGet = curl_init();
        curl_setopt($chGet,CURLOPT_URL,$urlGet);

        $request_headers = array(
                            "Authorization:Bearer " . $token,
                            "BRI-Timestamp:" . $timestamp,
                            "BRI-Signature:" . $base64sign
                        );
        curl_setopt($chGet, CURLOPT_HTTPHEADER, $request_headers);
        curl_setopt($chGet, CURLINFO_HEADER_OUT, true);


        // curl_setopt($chGet, CURLOPT_CUSTOMREQUEST, "GET");  //for updating we have to use PUT method.
        curl_setopt($chGet, CURLOPT_RETURNTRANSFER, true);

        $resultGet = curl_exec($chGet);
        $httpCodeGet = curl_getinfo($chGet, CURLINFO_HTTP_CODE);
        // $info = curl_getinfo($chGet);
        // print_r($info);
        curl_close($chGet);

        $jsonGet = json_decode($resultGet, true);

        dd($jsonGet);

        
       
    }
    
    public function saldoBRI()
    {
        
    }
}
