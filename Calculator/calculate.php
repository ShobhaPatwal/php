<?php
$displayVal = $_GET['displayVal'];
$previousVal = $_GET['previousVal'];
$operator = $_GET['operator'];
$opt = $_GET['opt'];
$operand = array();
$result;
function insert($previousVal, $displayVal) {
    global $operand;
    array_push($operand, $previousVal, $displayVal);
    return $operand;
}
$operand = insert($previousVal, $displayVal);
function operation($operator) {
    global $operand, $opt;
    switch ($opt) {
        case '+':
            $result = $operand[0] + $operand[1];
            $opt = $operator;
            break;
        case '-':
            $result = $operand[0] - $operand[1];
            $opt = $operator;
            break;
        case '*':
            $result = $operand[0] * $operand[1];
            $opt = $operator;
            break;
        case '/':
            $result = $operand[0] / $operand[1];
            $opt = $operator;
            break;
        case '=':
            $result = $operand[0];
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