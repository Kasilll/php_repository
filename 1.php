
<?php

	 
	//----------------------------------------
	// 1.2.1 задание 

	function findSimple($a,$b) {
		
		$arr = [];
	
		for($i = $a ; $i <= $b; $i++) {
			if(isPrimenumber($i)){
			    array_push($arr, $i);
			}
			
		}
		
		return $arr;
		}
    
    function isPrimenumber($num) {       //функция, которая проверяет являеться ли число простым.
        
        if($num == 1 || $num == 0) {
            return false;
        }
        
        if($num == 2) {
            return true;
        }
        
        for($i = 2; $i < $num;$i++)
        {
            if($num % $i == 0) {
                return false;
            }
        }
    
        return true;
    }
	
	findSimple(1,100);

	//-----------------------------------------
	

	//-----------------------------------------
	//1.2.2 задание 

	function createTrapeze($a) {
		
		$result = [];
		
		for($i = 0 ; $i < count($a); $i+=3) {
			$arr = [];
			$arr['a'] = $a[$i];
			$arr['b'] = $a[$i+1];
			$arr['c'] = $a[$i+2];
			array_push($result,$arr);
		}
		
		return $result;
	}
	$arr_createTrapeze = createTrapeze([1,2,3,4,5,6,7,8,9]); // положил результат выполнения функции createTrapeze в переменную $arr , чтобы предать этот массив в качесиве аргумента функции squareTrapeze.
	
	//----------------------------------------

	
	//----------------------------------------
	//1.2.3 задание

	function squareTrapeze($a) {
		
		for($i = 0 ; $i < count($a) ; $i ++) {
			$a[$i]['s'] = 1/2 * ($a[$i]['a'] + $a[$i]['b']) * $a[$i]['c'];
		}

		return $a;

	}

	$arr_squareTrapeze = squareTrapeze($arr_createTrapeze); // положил результат выполнения функции squareTrapeze в переменную arr_squareTrapeze
	//---------------------------------------
	

	//задание 1.2.4

	function getSizeForLimit($a,$b) {

		$result = $a[0];
		$max = $a[0]['s']; 

		for($i = 0 ; $i < count($a); $i++) {
			$trapezoidArea = $a[$i]['s'];
			if($max < $trapezoidArea && $trapezoidArea <= $b){
				$max = $a[$i]['s'];
				$result = $a[$i];
			}
		}
		
	
	
			array_pop($result);
			return $result;
		
	
	}

	var_dump(getSizeForLimit($arr_squareTrapeze,12));

	//-----------------------------------------
	

	//-----------------------------------------
	//1.2.5 задание

	function getMin ($a) {

		$min = NULL;

		for($i = 0 ; $i<count($a); $i++) {
			if($min === NULL) {		
				$min = $a[$i];
			}
			if($min > $a[$i]) {
				$min = $a[$i];
			}		
		}
		
		return $min;

	}
	getMin([10,2,3,10,5,8,9,-10]);
	getMin(['1'=>10,'2'=>-1,'3'=>121,'4'=>32,'5'=>29,'6'=>11]);

	//--------------------------------------------
	
	
	//--------------------------------------------

	// Задание 1.2.6

	function printTrapeze ($a) {

		$arr = ['a','b','c'];
		
		echo '<table cellpadding="5" cellspacing="0" border="1">';
		for($i = 0 ; $i < count($a); $i++) {
			echo "<tr>";
			for($j = 0;$j < count($arr);$j++) {
				$text = $arr[$j];
				if($a[$i]['s'] % 2 == 0) {
					echo '<td>'.$a[$i][$text].'</td>';
				}
				else {
					echo '<td style="background: red">'.$a[$i][$text].'</td>';
				}

			}				
			echo "</tr>";
		}
		
	}

	printTrapeze($arr_squareTrapeze);

	//----------------------------------------------


	//----------------------------------------------

	// задание 1.2.7 1.2.8

	abstract class BaseMath {
        public function exp1($a, $b, $c) {
            return $a*($b**$c);
        }
        
        public function exp2($a, $b, $c) {
            return ($a/$b)**$c;
        }
        
        abstract function getValue(); 
    
    }
    class F1 extends BaseMath {
        
        function __construct($a,$b,$c) {
            $this->a = $a;
            $this->b = $b;
            $this->c = $c;

        }
        
        public function getValue() {
            return $this->exp1($this->a,$this->b,$this->c)+($this->exp2($this->a,$this->b,$this->c))%3**min($this->a,$this->b,$this->c);
        
          
        }
    }
    
    $obj = new F1(1,1,1);
   
	

	//----------------------------------------------
?>

