<?php
/*

Use PHP 5.3.

Task: 
Develop a function which validates string looking like this "[{}]"
Every opening bracket should have corresponding closing bracket of same type
"[{}]" is a correct string, "[{]}" is malformed one.


Usage: <your host>/validateString.php?i={input string}

Example: <your host>/validateString.php?i={[{{}

*/


function validateString($inputString) {
	$symbol = array('}' => '{', ']' => '[');
	$stack = array();

	for($i = 0; $i < strlen($inputString); $i++) {
		if($inputString[$i] == '{' || $inputString[$i] == '[') {
			$stack[] = $inputString[$i];
		} elseif($inputString[$i] == '}' || $inputString[$i] == ']'){
			$tmp = array_pop($stack);

			if($tmp != $symbol[$inputString[$i]]) {
				return false;
			}
		}
	}
	
	return true;
}

$inputString = $_GET['i'];

echo "'".$inputString."' is ";
echo validateString($inputString)?"correct":"incorrect";