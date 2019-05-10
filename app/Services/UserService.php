<?php
namespace App\Services;

use App\Utilities\Sluggy;

class UserService {
    public function new($name, $config) {
        $userObject['game'] = [
            "name" => $name,
            "1" => [
                "1" => "0",
                "2" => "0",
                "score" => "0",
            ],
            "2" => [
                "1" => "0",
                "2" => "0",
                "score" => "0",
            ],
            "3" => [
                "1" => "0",
                "2" => "0",
                "score" => "0",
            ],
            "4" => [
                "1" => "0",
                "2" => "0",
                "score" => "0",
            ],
            "5" => [
                "1" => "0",
                "2" => "0",
                "score" => "0",
            ],
            "6" => [
                "1" => "0",
                "2" => "0",
                "score" => "0",
            ],
            "7" => [
                "1" => "0",
                "2" => "0",
                "score" => "0",
            ],
            "8" => [
                "1" => "0",
                "2" => "0",
                "score" => "0",
            ],
            "9" => [
                "1" => "0",
                "2" => "0",
                "score" => "0",
            ],
            "10" => [
                "1" => "0",
                "2" => "0",
                "3" => "0",
                "score" => "0",
            ]
        ];

        $_SESSION[$config] = json_encode($userObject);
        return $_SESSION[$config];
    }
}