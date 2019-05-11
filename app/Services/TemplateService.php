<?php
namespace App\Services;

use App\Services\ScoreService;

class TemplateService {

    public function scoringForm() {
        return '
            <div class="mx-auto w-1/6 border text-white mt-8 shadow-md rounded pb-4 bg-blue-darkest">
                <p class="font-bold w-full text-center mt-2 mb-2">Add Score</p>
                <div class="flex">
                    <div class="flex-1 text-center">
                        <form method="POST" action="/" class="' . (new ScoreService)->checkPins('1') . '">
                            <input type="hidden" name="form_type" value="score_1" />
                            <input class="shadow bg-orange hover:bg-orange-light focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="1" />
                        </form>
                    </div>
                    <div class="flex-1 text-center">
                        <form method="POST" action="/" class="' . (new ScoreService)->checkPins('2') . '">
                            <input type="hidden" name="form_type" value="score_2" />
                            <input class="shadow bg-orange hover:bg-orange-light focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="2" />
                        </form>
                    </div>
                    <div class="flex-1 text-center">
                        <form method="POST" action="/" class="' . (new ScoreService)->checkPins('3') . '">
                            <input type="hidden" name="form_type" value="score_3" />
                            <input class="shadow bg-orange hover:bg-orange-light focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="3" />
                        </form>
                    </div>
                </div>
                <div class="flex mt-4">
                    <div class="flex-1 text-center">
                        <form method="POST" action="/" class="' . (new ScoreService)->checkPins('4') . '">
                            <input type="hidden" name="form_type" value="score_4" />
                            <input class="shadow bg-orange hover:bg-orange-light focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="4" />
                        </form>
                    </div>
                    <div class="flex-1 text-center">
                        <form method="POST" action="/" class="' . (new ScoreService)->checkPins('5') . '">
                            <input type="hidden" name="form_type" value="score_5" />
                            <input class="shadow bg-orange hover:bg-orange-light focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="5" />
                        </form>
                    </div>
                    <div class="flex-1 text-center">
                        <form method="POST" action="/" class="' . (new ScoreService)->checkPins('6') . '">
                            <input type="hidden" name="form_type" value="score_6" />
                            <input class="shadow bg-orange hover:bg-orange-light focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="6" />
                        </form>
                    </div>
                </div>
                <div class="flex mt-4">
                    <div class="flex-1 text-center">
                        <form method="POST" action="/" class="' . (new ScoreService)->checkPins('7') . '">
                            <input type="hidden" name="form_type" value="score_7" />
                            <input class="shadow bg-orange hover:bg-orange-light focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="7" />
                        </form>
                    </div>
                    <div class="flex-1 text-center">
                        <form method="POST" action="/" class="' . (new ScoreService)->checkPins('8') . '">
                            <input type="hidden" name="form_type" value="score_8" />
                            <input class="shadow bg-orange hover:bg-orange-light focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="8" />
                        </form>
                    </div>
                    <div class="flex-1 text-center">
                        <form method="POST" action="/" class="' . (new ScoreService)->checkPins('9') . '">
                            <input type="hidden" name="form_type" value="score_9" />
                            <input class="shadow bg-orange hover:bg-orange-light focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="9" />
                        </form>
                    </div>
                </div>
                <div class="flex mt-4">
                    <div class="flex-1 text-center">
                        <form method="POST" action="/" class="' . (new ScoreService)->checkPins('10') . '">
                            <input type="hidden" name="form_type" value="score_10" />
                            <input class="shadow bg-orange hover:bg-orange-light focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="X" />
                        </form>
                    </div>
                    <div class="flex-1 text-center">
                        <form method="POST" action="/">
                            <input type="hidden" name="form_type" value="score_0" />
                            <input class="shadow bg-orange hover:bg-orange-light focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="0" />
                        </form>
                    </div>
                </div>
            </div>
        ';
    }

    public function bowling($bowlingConfig) {
        $gameConfig = json_decode($bowlingConfig, true);

        return '
            <div class="flex mt-2 font-bold">
                <div class="flex-1"></div>
                <div class="flex-1 text-center">1</div>
                <div class="flex-1 text-center">2</div>
                <div class="flex-1 text-center">3</div>
                <div class="flex-1 text-center">4</div>
                <div class="flex-1 text-center">5</div>
                <div class="flex-1 text-center">6</div>
                <div class="flex-1 text-center">7</div>
                <div class="flex-1 text-center">8</div>
                <div class="flex-1 text-center">9</div>
                <div class="flex-1 text-center">10</div>
            </div>
            <div class="flex mt-4 border border-grey-darkest shadow-md bg-blue">
                <div class="flex-1 border-r border-grey-darkest p-6 font-bold">' . $gameConfig['game']['name'] . '</div>
                <div class="flex-1 border-r border-grey-darkest p-6 relative">' . ScoreService::analyze($gameConfig['game']['1']['1'], $gameConfig, '1', '1') . '<div class="h-8 shadow-md absolute pin-t pin-r py-1 px-6 bg-blue-lighter border-l border-b border-grey-darkest">' . ScoreService::analyze($gameConfig['game']['1']['2'], $gameConfig, '1', '2') . '</div><div class="absolute pin-b pin-r py-2 px-6 font-bold">' . $gameConfig['game']['1']['score'] . '</div></div>
                <div class="flex-1 border-r border-grey-darkest p-6 relative">' . ScoreService::analyze($gameConfig['game']['2']['1'], $gameConfig, '2', '1') . '<div class="h-8 shadow-md absolute pin-t pin-r py-1 px-6 bg-blue-lighter border-l border-b border-grey-darkest">' . ScoreService::analyze($gameConfig['game']['2']['2'], $gameConfig, '2', '2') . '</div><div class="absolute pin-b pin-r py-2 px-6 font-bold">' . $gameConfig['game']['2']['score'] . '</div></div>
                <div class="flex-1 border-r border-grey-darkest p-6 relative">' . ScoreService::analyze($gameConfig['game']['3']['1'], $gameConfig, '3', '1') . '<div class="h-8 shadow-md absolute pin-t pin-r py-1 px-6 bg-blue-lighter border-l border-b border-grey-darkest">' . ScoreService::analyze($gameConfig['game']['3']['2'], $gameConfig, '3', '2') . '</div><div class="absolute pin-b pin-r py-2 px-6 font-bold">' . $gameConfig['game']['3']['score'] . '</div></div>
                <div class="flex-1 border-r border-grey-darkest p-6 relative">' . ScoreService::analyze($gameConfig['game']['4']['1'], $gameConfig, '4', '1') . '<div class="h-8 shadow-md absolute pin-t pin-r py-1 px-6 bg-blue-lighter border-l border-b border-grey-darkest">' . ScoreService::analyze($gameConfig['game']['4']['2'], $gameConfig, '4', '2') . '</div><div class="absolute pin-b pin-r py-2 px-6 font-bold">' . $gameConfig['game']['4']['score'] . '</div></div>
                <div class="flex-1 border-r border-grey-darkest p-6 relative">' . ScoreService::analyze($gameConfig['game']['5']['1'], $gameConfig, '5', '1') . '<div class="h-8 shadow-md absolute pin-t pin-r py-1 px-6 bg-blue-lighter border-l border-b border-grey-darkest">' . ScoreService::analyze($gameConfig['game']['5']['2'], $gameConfig, '5', '2') . '</div><div class="absolute pin-b pin-r py-2 px-6 font-bold">' . $gameConfig['game']['5']['score'] . '</div></div>
                <div class="flex-1 border-r border-grey-darkest p-6 relative">' . ScoreService::analyze($gameConfig['game']['6']['1'], $gameConfig, '6', '1') . '<div class="h-8 shadow-md absolute pin-t pin-r py-1 px-6 bg-blue-lighter border-l border-b border-grey-darkest">' . ScoreService::analyze($gameConfig['game']['6']['2'], $gameConfig, '6', '2') . '</div><div class="absolute pin-b pin-r py-2 px-6 font-bold">' . $gameConfig['game']['6']['score'] . '</div></div>
                <div class="flex-1 border-r border-grey-darkest p-6 relative">' . ScoreService::analyze($gameConfig['game']['7']['1'], $gameConfig, '7', '1') . '<div class="h-8 shadow-md absolute pin-t pin-r py-1 px-6 bg-blue-lighter border-l border-b border-grey-darkest">' . ScoreService::analyze($gameConfig['game']['7']['2'], $gameConfig, '7', '2') . '</div><div class="absolute pin-b pin-r py-2 px-6 font-bold">' . $gameConfig['game']['7']['score'] . '</div></div>
                <div class="flex-1 border-r border-grey-darkest p-6 relative">' . ScoreService::analyze($gameConfig['game']['8']['1'], $gameConfig, '8', '1') . '<div class="h-8 shadow-md absolute pin-t pin-r py-1 px-6 bg-blue-lighter border-l border-b border-grey-darkest">' . ScoreService::analyze($gameConfig['game']['8']['2'], $gameConfig, '8', '2') . '</div><div class="absolute pin-b pin-r py-2 px-6 font-bold">' . $gameConfig['game']['8']['score'] . '</div></div>
                <div class="flex-1 border-r border-grey-darkest p-6 relative">' . ScoreService::analyze($gameConfig['game']['9']['1'], $gameConfig, '9', '1') . '<div class="h-8 shadow-md absolute pin-t pin-r py-1 px-6 bg-blue-lighter border-l border-b border-grey-darkest">' . ScoreService::analyze($gameConfig['game']['9']['2'], $gameConfig, '9', '2') . '</div><div class="absolute pin-b pin-r py-2 px-6 font-bold">' . $gameConfig['game']['9']['score'] . '</div></div>
                <div class="flex-1 p-6 relative">' . ScoreService::analyze($gameConfig['game']['10']['1'], $gameConfig, '10', '1') . '<div class="absolute pin-t pin-r mr-8 h-8 w-8 shadow-md py-1 px-3 bg-blue-lighter border-l border-b border-grey-darkest">' . ScoreService::analyze($gameConfig['game']['10']['2'], $gameConfig, '10', '2') . '</div><div class="absolute h-8 w-8 pin-t pin-r py-1 px-3 bg-blue-lighter border-l border-b border-grey-darkest shadow-md">' . ScoreService::analyze($gameConfig['game']['10']['3'], $gameConfig, '10', '3') . '</div><div class="absolute pin-b pin-r py-2 px-6 font-bold">' . $gameConfig['game']['10']['score'] . '</div></div>
            </div>
        ';
    }

    public function userConfig() {
        return '
            <h3 class="w-full max-w-xs mx-auto text-center mb-4 mt-4 text-grey-darkest">Setup User</h3>
            <form class="w-full max-w-xs mx-auto" method="POST" action="/">
                <input type="hidden" name="form_type" value="user_config" />
                <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-grey-darkest font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Name
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input name="name" class="bg-grey-lighter appearance-none border-2 border-grey-lighter rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple" id="inline-full-name" type="text" value="" placeholder="Enter your name">
                </div>
                </div>

                <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <input class="shadow bg-green hover:bg-green-light focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="Start Game" />
                </div>
                </div>
            </form>
        ';
    }
}