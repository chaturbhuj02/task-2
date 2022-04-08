<?php
 
$publicapi_json = file_get_contents('https://api.publicapis.org/entries');
 
$category = $argv[1];
$limit = $argv[2];

$decoded_json = json_decode($publicapi_json, false);
$entries = $decoded_json->entries;
$stored_values = [] ;

foreach ( $entries as $value) {
    if($value->Category == $category){
        array_push($stored_values, $value->API);
    }
}

if(!$stored_values){
    print("No results");
}

rsort($stored_values);
$limited = array_slice($stored_values,0 , $limit);
print(implode(" \n", $limited));
 
?>