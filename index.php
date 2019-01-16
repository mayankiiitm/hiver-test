<?php 
function getMax(&$arr){
	$k=null;
	$v=0;
	foreach ($arr as $key => $value) {
		if($value>$v){
			$k=$key;
			$v=$value;
		}
	}
	if($k){
		$arr[$k]=0;
	}
	return $k;
}

$html=file_get_contents('https://hiverhq.com/');
$dom=new DOMdocument;
@$dom->loadHTML($html);
//remove script tags along with its content
while (($r = $dom->getElementsByTagName("script")) && $r->length) {
	$r->item(0)->parentNode->removeChild($r->item(0));
}
$body=$dom->getElementsByTagName('body')[0];
$str=$body->nodeValue;
//I have to use this function as new line creates problem in case of cross platform
$str = preg_replace('/\s+/', ' ', $str);
$word='';
$i=0;
$arr=[];
while(@$str[$i]!=''){
	// this check consider end of words as 'space' or '.', we can add more check here depending upon how we define a 'word'
	if($str[$i]==' ' || $str[$i]=='.'){
		if($word!=''){
			@$arr[$word]=$arr[$word]+1;
			$word='';
		}
	}else{
		$word.=$str[$i];
	}
	$i++;
}

echo getMax($arr)."\n";
echo getMax($arr)."\n";
echo getMax($arr)."\n";
echo getMax($arr)."\n";
echo getMax($arr)."\n";