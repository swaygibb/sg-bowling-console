<?php
namespace App\Services;

use App\Services\UserService;
use App\Services\SessionService;

class FormService {
    public function handleSubmit($config) {
        if(isset($_POST['form_type']) && $_POST['form_type'] == 'user_config') {
            return (new UserService)->new($_POST['name'], $config);
        }
        if(isset($_POST['form_type']) && $_POST['form_type'] == 'reset_game') {
            return (new SessionService)->clear($config);
        }
    }
}