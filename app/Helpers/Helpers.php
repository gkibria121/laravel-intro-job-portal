<?php
declare(strict_types=1);





function arrayToAccosArray(array $arr){

    if(!array_is_list($arr)){
        throw new Exception("Please provide array of string");
     }
    
   return  array_combine( array_map(
        'ucfirst',
        $arr 
    ), $arr);
} 