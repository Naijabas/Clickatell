<?php


$post_data = [$_POST];
logger($post_data);




function logger($post_data){
    if(!file_exists('log.txt')){
        file_put_contents('log.txt', '');
    }
    

    $content = file_get_contents('log.txt');
    $content .= "$post_data";

    file_put_contents('log.txt', $content);
}