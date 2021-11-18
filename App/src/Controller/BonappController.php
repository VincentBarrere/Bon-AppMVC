<?php

namespace App\src\Controller;

use App\src\Repository\ApiRepository;

class BonappController
{
    private $apiRepository;

    public function __construct()
    {
        $this->apiRepository = new ApiRepository('ef46cbc3fda74c139c6587a8b514823e');
    }

    public function home()
    {
        require "../templates/home.php";
    }
    public function choice()
    {
        $recipes = $this->apiRepository->callSpoonByIngredients();
        require "../templates/choice.php";
    }
}
