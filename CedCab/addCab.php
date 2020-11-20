<?php
$location_array = array(
    'Charbagh' => 0,
    'Indira Nagar' => 10,
    'BBD' => 30,
    'Barabanki' => 60,
    'Faizabad' => 100,
    'Basti' => 150,
    'Gorakhpur' => 210
);
$pickup = $_POST['pickup'];
$drop = $_POST['drop'];
$cabType = $_POST['cabType'];
$luggage_weight = $_POST['lug_weight'];
foreach ($location_array as $location=>$distance) {
    if ($location == $pickup) {
        $initial_distance = $distance;
        break;
    }
}
foreach ($location_array as $location=>$distance) {
    if ($location == $drop) {
        $final_distance = $distance;
        break;
    }
}
$total_distance = abs($final_distance - $initial_distance);
if ($cabType == "CedMicro") {
    $booking_price = 50;
    if ($total_distance <= 10) {
        $price = $total_distance * 13.50;
    }
    elseif ($total_distance <= 60) {
        $price = 10 * 13.50 + ($total_distance - 10)* 12.00; 
    }
    elseif ($total_distance <= 160) {
        $price = 10 * 13.50 + 50 * 12.00 + ($total_distance - 60)* 10.20;
    }
    elseif ($total_distance > 160) {
        $price = 10 * 13.50 + 50 * 12.00 + 100 * 10.20 + ($total_distance - 160)* 8.50;
    }   
    $total_price = number_format(($booking_price + $price),2);
}
elseif ($cabType == "CedMini") {
    $booking_price = 150;
    $luggage_price= 0;
    if ($total_distance <= 10) {
        $price = $total_distance * 14.50;
    }
    elseif ($total_distance <= 60) {
        $price = 10 * 14.50 + ($total_distance - 10)* 13.00; 
    }
    elseif ($total_distance <= 160) {
        $price = 10 * 14.50 + 50 * 13.00 + ($total_distance - 60)* 11.20;
    }
    elseif ($total_distance > 160) {
        $price = 10 * 14.50 + 50 * 13.00 + 100 * 11.20 + ($total_distance - 160)* 9.50;
    } 
    if (($luggage_weight > 0) && ($luggage_weight <= 10)) {
        $luggage_price = 50;
    }  
    elseif (($luggage_weight > 10) && ($luggage_weight <= 20)) {
        $luggage_price = 100;
    }
    elseif ($luggage_weight > 20) {
        $luggage_price = 200;
    } 
    $total_price = number_format(($booking_price + $price + $luggage_price),2);
}
elseif ($cabType == "CedRoyal") {
    $booking_price = 200;
    $luggage_price= 0;
    if ($total_distance <= 10) {
        $price = $total_distance * 15.50;
    }
    elseif ($total_distance <= 60) {
        $price = 10 * 15.50 + ($total_distance - 10)* 14.00;
    }
    elseif ($total_distance <= 160) {
        $price = 10 * 15.50 + 50 * 14.00 + ($total_distance - 60)* 12.20;
    }
    elseif ($total_distance > 160) {
        $price = 10 * 15.50 + 50 * 14.00 + 100 * 12.20 + ($total_distance - 160)* 10.50;
    }
    if (($luggage_weight > 0) && ($luggage_weight <= 10)) {
        $luggage_price = 50;
    }  
    elseif (($luggage_weight > 10) && ($luggage_weight <= 20)) {
        $luggage_price = 100;
    }
    elseif ($luggage_weight > 20) {
        $luggage_price = 200;
    }
    $total_price = number_format(($booking_price + $price + $luggage_price),2);
}
elseif ($cabType == "CedSUV") {
    $booking_price = 250;
    $luggage_price= 0;
    if ($total_distance <= 10) {
        $price = $total_distance * 16.50;
    }
    elseif ($total_distance <= 60) {
        $price = 10 * 16.50 + ($total_distance - 10)* 15.00;    
    }
    elseif ($total_distance <= 160) {
        $price = 10 * 16.50 + 50 * 15.00 + ($total_distance - 60)* 13.20;
    }
    elseif ($total_distance > 160) {
        $price = 10 * 16.50 + 50 * 15.00 + 100 * 13.20 + ($total_distance - 160)* 11.50;
    } 
    if (($luggage_weight > 0) && ($luggage_weight <= 10)) {
        $luggage_price = 100;
    } 
    elseif (($luggage_weight > 10) && ($luggage_weight <= 20)) {
        $luggage_price = 200;
    }
    elseif ($luggage_weight > 20) {
        $luggage_price = 400;
    }
    $total_price = number_format(($booking_price + $price + $luggage_price),2); 
}
$fare = array();
$fare['pickup'] = $pickup;
$fare['drop'] = $drop;
$fare['total_distance'] = $total_distance;
$fare['total_price'] = $total_price;
$cab_fare = json_encode($fare);
echo $cab_fare; 
?>