<?php

namespace App\WebService;

class ViaCep{
    public static function consultaEnderecoCEP(string $cep):array
    {
        $curl = curl_init();
        if(strlen($cep) != 8) return array('status'=>'NOK','message'=>'CEP invalido');
        curl_setopt_array($curl,[
            CURLOPT_URL => "https://viacep.com.br/ws/{$cep}/json/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET"
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        $array = json_decode($response,true);
        if(!isset($array['cep']))return array();
        $array['status'] = 'OK';
        $array['message'] = 'CEP retornado com sucesso';

        return $array;
    }
}
?>