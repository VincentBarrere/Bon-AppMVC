<?php

namespace App\src\Controller;

use App\src\Repository\ApiRepository;

class BonappController
{
    private $apiRepository;

    public function __construct()
    {
        $this->apiRepository = new ApiRepository('c5c275385d3e48b3a9d10e5b96c15a04');
    }

    public function home()
    {
        require "../templates/home.php";
    }
    public function recipe()
    {
        $recipes = $this->apiRepository->callSpoonByIngredients();
        require "../templates/recipe.php";
    }
}
