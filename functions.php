<?php 
function greeting(){

    $timeOfDay = date('a');
    if($timeOfDay == 'am'){
        return 'Good morning ,';
    }else{
        return 'Good night ,';
    }

}


function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}


function getAge($date){
    //$date = "$year-$month-$day";
    if(version_compare(PHP_VERSION, '5.3.0') >= 0){
        $dob = new DateTime($date);
        $now = new DateTime();
        return $now->diff($dob)->y;
    }
    $difference = time() - strtotime($date);
    return floor($difference / 31556926);
}


?>