<?php 
$html=file_get_contents('https://hiverhq.com/');

$dom=new DOMdocument;
@$dom->loadHTML($html);

//remove script tags along with its content
while (($r = $dom->getElementsByTagName("script")) && $r->length) {
	$r->item(0)->parentNode->removeChild($r->item(0));
}

$body=$dom->getElementsByTagName('body')[0];
$words=str_word_count($body->nodeValue, 1);
$wordCount=array_count_values($words);
arsort($wordCount);
$top5=array_keys(array_slice($wordCount,0,5));
print_r($top5);