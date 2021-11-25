<?php

namespace App\src\Repository;


class ApiRepository
{
    private $key;

    public function __construct(string $apiKey)
    {
        $this->key = $apiKey;
    }

    public function callSpoonByIngredients()
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.spoonacular.com/recipes/716429/information?apiKey=46f646e07c1946fdbbd02dc7c56c7527&includeNutrition=false");

        $data = curl_exec($ch);
        $result = $data;

        $err = curl_error($ch);
        curl_close($ch);


        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return $result;
        }
    }
}
