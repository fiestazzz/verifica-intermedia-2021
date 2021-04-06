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
        $result=stripos($Oggetto->GetAge(), $eta) !==false;
        return $result;
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









?>