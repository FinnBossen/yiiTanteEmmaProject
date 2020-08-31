<?php
namespace app\services;

use DateTime;
use yii\base\Component;
class CalenderService extends Component
{
    public $calenderWeeks = array();
    function __construct() {
        parent::__construct();
        for ($i = 1; $i <= $this->getCurrentWeeksInYear(); $i++) {
            array_push($this->calenderWeeks, 'Klw_'.$i);
        }
    }
    function checkIfWednesday(){
        return date('W') == 3;
    }
    // maybe check if monday or tuesday, when yes its still the calender week before because of the wednesday change logic
    function getCurrentCalenderWeek(){
        return date('W');
    }
    function getCurrentWeeksInYear() {
        $date = new DateTime;
        $date->setISODate(date('Y'), 53);
        return ($date->format('W') === '53' ? 53 : 52);
    }
    function compareCalenderWeeks($currentWeek){
        // return $calenderWeeks[$currentWeek+1];
    }
}