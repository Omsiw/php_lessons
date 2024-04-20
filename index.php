<?php
interface iCalculator{
    public function action($a,$b);
}

class Plus implements iCalculator{
    public function action($a,$b){
        return $a + $b;
    }
}

class Minus implements iCalculator{
    public function action($a,$b){
        return $a - $b;
    }
}

class Multuply implements iCalculator{
    public function action($a,$b){
        return $a * $b;
    }
}

class Divide implements iCalculator{
    public function action($a,$b){
        try {
            $res = $a / $b;
            return $res;
        } catch (\Throwable $th) {
            echo "err: {$th->getMessage()}\n";
            return;
        }
    }
}
class Factorial implements iCalculator{
    public function action($a,$b){
        if ($a == 1 || $a == 0) 
            return 1;
        return $this->action($a-1,0) * $a;
    }
}
class Fibonacci implements iCalculator{
    public function action($a,$b){
        $arr = [0, 1];
        for( $i = 2; $i < $a; $i++ ){
            $arr[$i] = $arr[$i-1] + $arr[$i-2];
        }
        $arr[1] = 0;
        return $arr;
    }
}

$first = $_GET["first"];
$second = $_GET["second"];
$funct = $_GET["funct"];
switch ($funct) {
    case 'plus':
        $calt = new Plus();
        break;
    case 'minus':
        $calt = new Minus();
        break;
    case 'multiply':
        $calt = new Multuply();
        break;
    case 'divide':
        $calt = new Divide();
        break;
    case 'factorial':
        $calt = new Factorial();
        break;
    case 'fibonacci':
        $calt = new Fibonacci();    
        echo"<div>";
        foreach($calt->action($first, $second) as $num)
            echo $num . " ";
        echo "</div>";
        die();
    default:
        echo "???";
        die();
}
echo "<div>{$calt->action($first, $second)}</div>";
?>