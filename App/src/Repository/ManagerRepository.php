<?php

namespace App\src\Repository;

use PDO;
use Exception;

class ManagerRepository
{
    public $connection;

    public function getConnection()
    {
        try {
            $database = new PDO(DB_FULL_HOST, DB_USER, DB_PASSWORD);
            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection = $database;

            return $this->connection;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function checkConnection()
    {
        if ($this->connection === null) {
            return $this->getConnection();
        }
        return $this->connection;
    }

    public function createQuery($sql, $parameters = null)
    {
        $result = $this->checkConnection()->prepare($sql);
        $result->setFetchMode(PDO::FETCH_CLASS, static::class);

        if ($parameters) {
            $result->execute($parameters);
        } else {
            $result->execute();
        }
        return $result;
    }

    // public function translate($chaine)
    // {
    //     $chaine = urlencode($chaine);
    //     $url = 'http://translate.google.com/translate_a/t?client=p&text=' . $chaine . '&hl=en&sl=en&tl=fr&ie=UTF-8&oe=UTF-8&multires=1&otf=1&pc=1&trs=1&ssel=3&tsel=6&sc=1';
    //     $ch = curl_init();
    //     curl_setopt_array($ch, [
    //         CURLOPT_URL => $url,
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_TIMEOUT => 1
    //     ]);
    //     $data = curl_exec($ch);
    //     return $data;
    // }
}
