<?php

namespace App\src\Controller;

use App\src\Repository\ApiRepository;

class BonappController extends AbstractController
{
    private $apiRepository;

    public function __construct()
    {
        $this->apiRepository = new ApiRepository('c5c275385d3e48b3a9d10e5b96c15a04');
    }

    public function home()
    {
        $this->render("home");
    }
    public function recipe()
    {
        $recipes = $this->apiRepository->callSpoonByIngredients();
        $this->render("recipe", [
            'recipes' => $recipes
        ]);
    }
    public function form()
    {
        $this->render("form");
    }
}
