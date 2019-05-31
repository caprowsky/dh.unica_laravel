@php

function iterate($a,$i) {
	if (!is_string($a)) {
		$i=$i."&nbsp;-&nbsp;";
		foreach ($a as $c=>$v){
		echo $i.$c.":";
		echo iterate($v,$i);
		}
	}
	else return $a;
}

if (substr($val,0,1)=='{') 
	{
		$json=json_decode($val);
		echo "<strong>JSON: ".json_last_error_msg()."</strong><br>";
		foreach ($json as $c=>$v)
		{
			echo "<br>".$c.":";
			echo iterate($v,"<br>");
		}
	} else {
		echo $val;
	}
@endphp
