<?php
namespace App\Services;

use App\Services\SessionService;
use App\Services\TemplateService;
use App\Services\FormService;

class LoadService {
    public function execute() {
        if(isset($_POST) && count($_POST)) {
            (new FormService)->handleSubmit('bowlingConfig');
        }
        //Check if users are setup yet - saved to session
        $bowlingConfig = (new SessionService)->get('bowlingConfig');
        //If they are display template
        if($bowlingConfig) {
            return (new TemplateService)->bowling($bowlingConfig);
        }
        //If they are not, then ask for user name
        if(!$bowlingConfig) {
            return (new TemplateService)->userConfig();
        }
    }
}