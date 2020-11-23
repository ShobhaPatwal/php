<?php
$displayVal = $_GET['displayVal'];
$previousVal = $_GET['previousVal'];
$operator = $_GET['operator'];
$opt = $_GET['opt'];
$operand = array();
$result;
function operation($operator) {
    global $previousVal, $displayVal, $opt;
    switch ($opt) {
        case '+':
            $result = $previousVal + $displayVal;
            $opt = $operator;
            break;
        case '-':
            $result = $previousVal - $displayVal;
            $opt = $operator;
            break;
        case '*':
            $result = $previousVal * $displayVal;
            $opt = $operator;
            break;
        case '/':
            if ($displayVal == 0) {
                $result = 'infinite';
            } 
            else {
                $result = $previousVal / $displayVal;
            }
            $opt = $operator;
            break;
        case '=':
            $result = $previousVal;
            $opt = $operator;
            break;  
        default:
            break;
    } 
    return $result;
}
$result = operation($operator);
$array = array();
$array['result'] = $result;
$array['operator'] = $opt;
$calculate = json_encode($array);
echo $calculate;
?>