<?php
namespace App\Services;

use App\Services\SessionService;

class ScoreService {
    public function calculate($score, $config) {
        $bowlingConfig = (new SessionService)->get('bowlingConfig');
        $gameConfig = json_decode($bowlingConfig, true);
        $scoreCalulated = false;

        foreach($gameConfig['game'] as $frame => $gameItem) {
            if($frame != 'name') {
                foreach($gameItem as $shot => $itemValue) {
                    if($shot != 'score' && !strlen($itemValue)) {
                        if(($shot == '2' && $gameConfig['game'][$frame]['1'] != '10' && $frame != '10') || $shot != '2' || ($frame == '10' && $shot == '2')) {
                            $this->tallyScore($frame, $shot, $gameConfig, $score);
                            if($shot == '1' && (int)$score < 10) {
                                self::hidePins((string)(10 - (int)$score));
                            } else {
                                self::hidePins('10');
                            }
                            $scoreCalulated = true;
                        }
                    }
                    if($scoreCalulated) {
                        break;
                    }
                }
                if($scoreCalulated) {
                    break;
                }
            }
        }
        $this->generateTotal($gameConfig);

        return (new SessionService)->set($config, json_encode($gameConfig));
    }

    public function tallyScore($frame, $shot, &$gameConfig, $score) {
        $gameConfig['game'][$frame][$shot] = $score;
    }

    public function score($gameConfig, $frame, $shot) {
        return (int)$gameConfig['game'][(string)$frame][(string)$shot];
    }

    public function generateTotal(&$gameConfig) {
        $currentScore = 0;
        $addToScore = false;
        $calculate = true;
        foreach($gameConfig['game'] as $frame => $gameItem) {
            if($frame != 'name') {
                $addToScore = false;
                foreach($gameItem as $shot => $itemValue) {
                    if($shot != 'score' && strlen($itemValue) && $calculate) {
                        $currentScore += $this->score($gameConfig, $frame, $shot);
                        //if score a strike, get next two shots to add to current score
                        if($itemValue == 10 && $frame != 10) {
                            if($this->score($gameConfig, ((int)$frame + 1), '1') != 10 && strlen($gameConfig['game'][(string)((int)$frame + 1)]['1']) && strlen($gameConfig['game'][(string)((int)$frame + 1)]['2'])) {
                                $currentScore += (int)$gameConfig['game'][(string)((int)$frame + 1)]['1'];
                                $currentScore += (int)$gameConfig['game'][(string)((int)$frame + 1)]['2'];
                                $calculate = true;
                            }
                            if((int)$gameConfig['game'][(string)((int)$frame + 1)]['1'] == 10 && strlen($gameConfig['game'][(string)((int)$frame + 1)]['1']) && $frame != '9' && strlen($gameConfig['game'][(string)((int)$frame + 2)]['1'])) {
                                $currentScore += (int)$gameConfig['game'][(string)((int)$frame + 1)]['1'];
                                $currentScore += (int)$gameConfig['game'][(string)((int)$frame + 2)]['1'];
                                $calculate = true;
                            }
                            if((int)$gameConfig['game'][(string)((int)$frame + 1)]['1'] == 10 && strlen($gameConfig['game'][(string)((int)$frame + 1)]['1']) && strlen($gameConfig['game'][(string)((int)$frame + 1)]['2']) && $frame == '9') {
                                $currentScore += (int)$gameConfig['game'][(string)((int)$frame + 1)]['1'];
                                $currentScore += (int)$gameConfig['game'][(string)((int)$frame + 1)]['1'];
                                $calculate = true;
                            }
                        } else {
                            $calculate = true;
                        }
                        //if score a spare, get the next score to add to it if available
                        if($shot == '2' && ((int)$itemValue + (int)$gameConfig['game'][(string)((int)$frame)]['1']) >= 10 && $frame != 10) {
                            if($frame != '10') {
                                $currentScore += (int)$gameConfig['game'][(string)((int)$frame + 1)]['1'];
                                $calculate = true;
                            } else {
                                $currentScore += (int)$gameConfig['game'][(string)((int)$frame)]['3'];
                                $calculate = true;
                            }
                        }
                        $addToScore = true;
                    }
                }
                $calculate = true;
            }
            if($addToScore) {
                $gameConfig['game'][$frame]['score'] = (int)$currentScore;
            }
        }
    }

    /**
     * analyze
     * @param string $score
     * @param array $gameConfig
     * @param string $frame
     * @param string $shot
     * @return string analyzed score
     */
    public static function analyze($score, $gameConfig, $frame, $shot) {
        if(strlen($score)) {
            if($score == '10')
                return 'X';
            if($shot == '2' && (int)($score + $gameConfig['game'][$frame]['1']) >= 10) {
                return '/';
            }
        }
        return $score;
    }

    /**
     * hidePins - hide pins available from user input
     * @param string $pinsLeft
     */
    public static function hidePins($pinsLeft) {
        (new SessionService)->set('pinsLeft', $pinsLeft);
    }

    /**
     * checkPins - check which pins are availble
     * @param string $pins
     * @return string class of whether user interface item should be removed
     */
    public function checkPins($pins) {
        return ((int)(new SessionService)->get('pinsLeft') < (int)$pins) ? 'invisible' : 'visible';
    }
}