<?php

namespace app\services;

use DateTime;
use yii\base\Component;

class CalenderService extends Component
{
    public $calenderWeeks = array();

    function __construct()
    {
        parent::__construct();
        for ($i = 1; $i <= $this->getCurrentWeeksInYear(); $i++) {
            array_push($this->calenderWeeks, 'Klw_' . $i);
        }
    }

    // determine if the current Year has 53 or 52 weeks
    public function getCurrentWeeksInYear()
    {
        $date = new DateTime;
        $date->setISODate(date('Y'), 53);
        return ($date->format('W') === '53' ? 53 : 52);
    }

    // only uses current calenderWeek when its wednesday or past,
    // changes content on wednesday not at the beginning of the week
    public function getCurrentCalenderWeek()
    {
        $calenderWeek = date('W');
        if ($this->wednesdayChecker()) {
            return $calenderWeek;
        }
        return $calenderWeek - 1;
    }

    private function wednesdayChecker()
    {
        if (date('w') < 3) {
            return false;
        }
        return true;
    }

}