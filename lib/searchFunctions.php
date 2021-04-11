<?php


function searchTextNome($testo)
{
    return function($Oggetto) use ($testo)
    {
        $result=stripos($Oggetto->getFirstName(), $testo) !==false;
        return $result;
    };
}

function searchTextCognome($testo)
{
    return function($Oggetto) use ($testo)
    {
        $result=stripos($Oggetto->getLastName(), $testo) !==false;
        return $result;
    };
}

function searchTextEmail($mail)
{
    return function($Oggetto) use ($mail)
    {
        $result=stripos($Oggetto->getEmail(), $mail) !==false;
        return $result;
    };
}

function searchTexteta($eta)
{
    return function($Oggetto) use ($eta)
    {
        if(floatval($Oggetto->GetAge()) === floatval($eta))
        {
            return true;
        }
        else
        {
            return false;
        }
    };
}

function searchTextid($id)
{
    return function($Oggetto) use ($id)
    {
        $result=stripos($Oggetto->GetUserId(), $id) !==false;
        return $result;
    };
}

function Ordina($lettera)
{
    return function ($oggetto) use ($lettera)
    {
        $result = stripos($oggetto->getLastName(),$lettera) !== false;
        return $result;
    };
}









?>