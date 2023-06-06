<?php

class CurrencyConverter
{
    private $apiUrl = 'https://api.nbrb.by/exrates/rates/431';

    public function getExchangeRate()
    {
        $response = $this->makeRequest($this->apiUrl);
        $responseData = json_decode($response, true);

        if ($responseData && isset($responseData['Cur_OfficialRate'])) {
            return $responseData['Cur_OfficialRate'];
        }

        return null;
    }

    private function makeRequest($url)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $response = curl_exec($curl);

        if ($response === false) {
            echo 'Ошибка при выполнении запроса: ' . curl_error($curl);
        }

        curl_close($curl);

        return $response;
    }
}
