<?php

function sanitizeName($name){
    
    $sanitizedString = filter_var($name,FILTER_SANITIZE_STRING);

    $tinyName = preg_replace('/[^a-zA-Z ]+/', '', $sanitizedString);
    $explodeName = explode(" ", $tinyName);
    $correctCaseNames = array_map('correctCase', $explodeName);
    
    return implode(" ", $correctCaseNames);
    //return $uppercaseName;
}


function correctCase($name)
{
     // aAa | AAA | aaA ---> aaa
     $nameLowecase = strtolower($name);
     // aaa --> Aaa
     $uppercaseName = ucfirst($nameLowecase);
     return $uppercaseName;
}


