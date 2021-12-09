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
    public function choice()
    {
        require "../templates/choice.php";
    }
    public function recipe($choice_post)
    {
        extract($choice_post);
        if (isset($_POST)) {
            $ingredient = $_POST['ingredient'];
            $cleanse_ingredient = filter_var($ingredient, FILTER_SANITIZE_STRING);
        }
        $recipes = $this->apiRepository->callSpoonByIngredients($cleanse_ingredient);
        require "../templates/recipe.php";
    }
}
