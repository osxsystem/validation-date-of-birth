<?php

$birthDay = $_GET['birthday'];

$testArr = explode('-', $birthDay);

if (count($testArr) == 3) {
    if( checkdate($testArr[1], $testArr[2], $testArr[0])) {
        // valid date
        // check age
        $age = getAge($birthDay);
        if($age > 18) {
            echo json_encode('Accepted.');
        }
        if($age < 18 && $age > 0) {
            echo json_encode('Not Allowed.');
        }
        if($age < 0 || $age == 0) {
            echo json_encode("Invisible...");
        }
    } else {
        // invalid date format
        echo json_encode("Invalid.");
    }
} else{
    // invalid input
    echo json_encode('Invalid!');
}

/**
 * Calculate the age depend on birthday, we use strtotime, so time begin calculate since 01-01-1970.
 * @param  string    your birthday
 * @return interger  your age.
 */
function getAge($date) {
    return intval(date('Y', time() - strtotime($date))) - 1970;
}