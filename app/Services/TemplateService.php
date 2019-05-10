<?php
namespace App\Services;

class TemplateService {
    public function bowling($bowlingConfig) {
        $gameConfig = json_decode($bowlingConfig);

        return '
            <div class="flex mt-12 font-bold">
                <div class="flex-1">Name</div>
                <div class="flex-1 text-center">1</div>
                <div class="flex-1 text-center">2</div>
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
            <div class="flex mt-4 border border-grey-darkest">
                <div class="flex-1">' . $gameConfig->game->name . '</div>
                <div class="flex-1">1</div>
                <div class="flex-1">2</div>
                <div class="flex-1">2</div>
                <div class="flex-1">3</div>
                <div class="flex-1">4</div>
                <div class="flex-1">5</div>
                <div class="flex-1">6</div>
                <div class="flex-1">7</div>
                <div class="flex-1">8</div>
                <div class="flex-1">9</div>
                <div class="flex-1">10</div>
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