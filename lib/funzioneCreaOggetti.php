<?php

function UserFactory ($fileJson)
 {
     $OggettiJson=[];
     foreach ($fileJson as $value) 
    { 
        $user= new User();
        $user->setUserid($value['id']);
        $user->setFirstName(sanitizeName($value['firstName']));
        $user->setLastName(sanitizeName($value['lastName']));
        $user->setEmail($value['email']);
        $user->setBirthday($value['birthday']);
        $user->setMaggiorenne($user->isAdult());
        
        $OggettiJson[]=$user;   
    }
    return $OggettiJson;
 }




?>