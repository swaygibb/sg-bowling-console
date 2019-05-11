<?php
namespace App\Services;

use App\Services\SessionService;
use App\Services\TemplateService;
use App\Services\FormService;

class LoadService {

    /**
     * execute - load the bowling system
     * @return mixed
     */
    public function execute() {
        if(isset($_POST) && count($_POST)) {
            (new FormService)->handleSubmit('bowlingConfig');
        }
        $bowlingConfig = (new SessionService)->get('bowlingConfig');
        if($bowlingConfig) {
            return (new TemplateService)->bowling($bowlingConfig) . (new TemplateService)->scoringForm();
        }
        if(!$bowlingConfig) {
            return (new TemplateService)->userConfig();
        }
    }
}