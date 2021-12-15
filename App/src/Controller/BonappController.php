<?php

namespace App\src\Controller;

use App\src\Repository\ApiRepository;

class BonappController
{
    private $apiRepository;

    public function __construct()
    {
        extract($_POST);
        if (isset($_POST)) {
            $ingredient = $_POST['ingredient'];
            $choice_post = filter_var($ingredient, FILTER_SANITIZE_STRING);
        }
        $this->apiRepository = new ApiRepository('c5c275385d3e48b3a9d10e5b96c15a04', $choice_post);
    }

    public function home()
    {
        require "../templates/home.php";
    }
    public function choice()
    {
        require "../templates/choice.php";
    }
    public function recipe()
    {
        $recipes = $this->apiRepository->callSpoonByIngredients();
        require "../templates/recipe.php";
    }
}
