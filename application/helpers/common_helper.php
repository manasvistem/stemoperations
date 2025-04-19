<?php
if (!function_exists('dd')) {
    function dd($arg) {
        if (is_string($arg)) {
            if ($arg !== '') {
                echo $arg;
            }else{
                echo "value is empty";
            }
            die();
        } elseif (is_array($arg)) {
            echo "<pre>";
            print_r($arg);
            die();
        } elseif (is_object($arg)) {
            var_dump($arg);
            die();
        }elseif (is_numeric($arg)) {
            echo $arg;
            die();
        }else{
            echo "<br/>";
            die("STEM LEARNING");
        }
    }
}

if(!function_exists('getTaskTypeId')){
    function getTaskTypeId($taskTypeName){
        $CI =& get_instance();
        // Load the model if not already loaded
        $CI->load->model('Menu_model');
        $taskTypeId = $CI->Menu_model->getTaskTypeId($taskTypeName);
        return $taskTypeId;
    }
}

if(!function_exists('isNotWeekend')){
function isNotWeekend($date) {
    // Convert date to timestamp
    $timestamp = strtotime($date);
    // Get day of the week (1 = Monday, 7 = Sunday)
    $dayOfWeek = date('N', $timestamp);
    
    // If it's Sunday, it's a weekend
    if ($dayOfWeek == 7) {
        return false;
    }

    // If it's Saturday, check if it's the 2nd or 4th Saturday
    if ($dayOfWeek == 6) {
        // Get the day of the month
        $dayOfMonth = date('j', $timestamp);
        
        // Find the first day of the month
        $firstDayOfMonth = strtotime(date('Y-m-01', $timestamp));
        
        // Get the first Saturday of the month
        $firstSaturday = strtotime('first saturday of ' . date('F Y', $timestamp));

        // Calculate the second and fourth Saturdays
        $secondSaturday = strtotime('+7 days', $firstSaturday);
        $fourthSaturday = strtotime('+21 days', $firstSaturday);

        // If the date falls on the 2nd or 4th Saturday, it's a weekend
        if ($timestamp == $secondSaturday || $timestamp == $fourthSaturday) {
            return false;
        }
    }
    // If it's not Sunday, 2nd Saturday, or 4th Saturday, it's a working day
    return true;
}
}

if(!function_exists('get_indian_languages')){
    function get_indian_languages() {
        $CI =& get_instance();
        // Load the model if not already loaded
        $CI->load->model('Menu_model');
        $DataSet = $CI->Menu_model->get_indian_languages();
        return $DataSet;
    }
}

if(!function_exists('get_CMbyUserID')){
    function get_CMbyUserID($user_id) {
        $CI =& get_instance();
        $CI->load->model('Menu_model');
        $DataSet = $CI->Menu_model->get_CMbyUserID($user_id);
        return $DataSet;
    }
}

if(!function_exists('getSchoolListByTaskID')){
    function getSchoolListByTaskID($user_id,$taskId){
        $CI = &get_instance();
        $CI->load->model('Menu_model');
        $DataSet = $CI->Menu_model->getSchoolListByTaskID($user_id,$taskId);
        return $DataSet;
    }
}

if(!function_exists('getRMcontact')){
    function getRMcontact($user_id){
        $CI = &get_instance();
        $CI->load->model('Menu_model');
        $DataSet = $CI->Menu_model->getRMcontact($user_id);
        return $DataSet;
    }
}
?>