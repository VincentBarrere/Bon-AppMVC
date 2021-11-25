<?php

namespace App\src\Controller;

use App\src\Repository\ApiRepository;

class BonappController
{
    private $apiRepository;

    public function __construct()
    {
        $this->apiRepository = new ApiRepository('46f646e07c1946fdbbd02dc7c56c7527');
    }

    public function home()
    {
        require "../templates/home.php";
    }
    public function recipe()
    {
        // $recipes = $this->apiRepository->callSpoonByIngredients();
        require "../templates/recipe.php";
    }
}
