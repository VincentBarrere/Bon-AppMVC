<?php

namespace App\src\Repository;

use App\src\Repository\ManagerRepository;


class ApiRepository extends ManagerRepository
{
    private $apiKey;
    private $choice_post;

    public function __construct(string $apiKey, string $choice_post)
    {
        $this->apiKey = $apiKey;
        $this->choice_post = $choice_post;
    }

    public function callSpoonByIngredients()
    {

        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => "https://api.spoonacular.com/recipes/complexSearch?query={$this->choice_post}&number=12&apiKey={$this->apiKey}",
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
