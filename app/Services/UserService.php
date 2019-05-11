<?php
namespace App\Services;

use App\Utilities\Sluggy;

class UserService {

    /**
     * new - setup new user config
     * @param string $name
     * @param string $config
     * @return string
     */
    public function new($name, $config) {
        $userObject['game'] = [
            "name" => $name,
            "1" => [
                "1" => "",
                "2" => "",
                "score" => "",
            ],
            "2" => [
                "1" => "",
                "2" => "",
                "score" => "",
            ],
            "3" => [
                "1" => "",
                "2" => "",
                "score" => "",
            ],
            "4" => [
                "1" => "",
                "2" => "",
                "score" => "",
            ],
            "5" => [
                "1" => "",
                "2" => "",
                "score" => "",
            ],
            "6" => [
                "1" => "",
                "2" => "",
                "score" => "",
            ],
            "7" => [
                "1" => "",
                "2" => "",
                "score" => "",
            ],
            "8" => [
                "1" => "",
                "2" => "",
                "score" => "",
            ],
            "9" => [
                "1" => "",
                "2" => "",
                "score" => "",
            ],
            "10" => [
                "1" => "",
                "2" => "",
                "3" => "",
                "score" => "",
            ]
        ];

        $_SESSION[$config] = json_encode($userObject);
        return $_SESSION[$config];
    }
}