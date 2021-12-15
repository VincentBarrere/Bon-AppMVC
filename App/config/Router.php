<?php

namespace App\config;

use App\src\Controller\BonappController;

class Router
{
    private $bonAppController;

    public function __construct()
    {
        $this->bonAppController = new BonappController();
    }

    public function run()
    {
        if (isset($_GET['route'])) {
            if ($_GET['route'] === "recipe") {
                $this->bonAppController->recipe();
            }
            if ($_GET['route'] === "choice") {
                $this->bonAppController->choice();
            }
        } else {
            $this->bonAppController->home();
        }
    }
}
