<?php

use app\classes\Message;

function dd($dump)
{
	echo "<pre>";
	var_dump($dump);
	die();
}

function redirect($location)
{
	header("Location: {$location}");
}

function flash($messages)
{
	return (new Message)->add($messages);
}

function getFlashMessage()
{
	return (new Message)->get();
}

function clearString($string)
{
	$newString = preg_replace("/[^0-9]/", "", $string);

	return $newString;
}

function Mask($mask, $string){

    if(!empty($string)) {
    	$newString = str_replace(" ", "", $string);

    	for($index = 0; $index < strlen($newString); $index++){
    	    $mask[strpos($mask, "#")] = $newString[$index];
    	}

    	return $mask;
    }

    return '';
}






/****************************
*****************************
******VALIDADOR DE CPF*******
*****************************
*****************************/
function isValidCpf($cpfNumber) {
	// Verifica se um número foi informado
	if(!empty($cpfNumber)) {
		// Elimina possivel mascara
		$newCpf = preg_replace("/[^0-9]/", "", $cpfNumber);
		$newCpf = str_pad($newCpf, 11, '0', STR_PAD_LEFT);		
		// Verifica se o numero de digitos informados é igual a 11 
		if (strlen($newCpf) == 11) {
			$sequences = [
				'00000000000',
				'11111111111',
				'22222222222',
				'33333333333',
				'44444444444',
				'55555555555',
				'66666666666',
				'77777777777',
				'88888888888',
				'99999999999'
			];
			// Verifica se nenhuma das sequências invalidas abaixo 
			// foi digitada. Caso afirmativo, retorna falso
			if (!in_array($newCpf, $sequences)) {
			 // Calcula os digitos verificadores para verificar se o
			 // CPF é válido
				for ($t = 9; $t < 11; $t++) {					
					for ($d = 0, $c = 0; $c < $t; $c++) {
						$d += $newCpf{$c} * (($t + 1) - $c);
					}
					$d = ((10 * $d) % 11) % 10;
					if ($newCpf{$c} != $d) {
						return false;
					}
				}
				return true;
			 }
		}		
	}

	return false;

}