<?php 

	function debug($arr){
		echo '<pre>'.print_r($arr, true).'</pre>'; die;
	}


    function filter($value){
        $cleanSpaces = trim($value);
        $cleanTags = strip_tags($cleanSpaces);
        return $harmless = htmlspecialchars($cleanTags, ENT_QUOTES);
    }




 ?>