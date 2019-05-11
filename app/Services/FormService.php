<?php
namespace App\Services;

use App\Services\UserService;
use App\Services\SessionService;
use App\Services\ScoreService;

class FormService {
    public function handleSubmit($config) {
        if(isset($_POST['form_type']) && $_POST['form_type'] == 'user_config') {
            return (new UserService)->new($_POST['name'], $config);
        }
        if(isset($_POST['form_type']) && $_POST['form_type'] == 'reset_game') {
            (new SessionService)->set('pinsLeft', '10');
            return (new SessionService)->clear($config);
        }
        if(isset($_POST['form_type']) && strpos($_POST['form_type'], 'score_') !== false) {
            return (new ScoreService)->calculate(str_replace('score_', '', $_POST['form_type']), $config);
        }
    }
}