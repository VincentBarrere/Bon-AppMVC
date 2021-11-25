<?php

namespace App\src\Repository;

use App\src\Repository\ManagerRepository;


class ApiRepository extends ManagerRepository
{
    private $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function callSpoonByIngredients()
    {
        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => "https://api.spoonacular.com/recipes/complexSearch?query=pasta&number=10&apiKey={$this->apiKey}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 1
        ]);
        $data = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $results = [];
            $data = json_decode($data, true);
            foreach ($data["results"] as $recipe) {
                $results[] = [
                    "title" => $recipe["title"],
                    "img" => $recipe["image"]
                ];
            }
            return $results;
        }
    }
}
