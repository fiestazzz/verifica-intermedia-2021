<?php
require './class/User.php';
require './lib/GetContentJson.php';
require './lib/searchFunctions.php';
require './lib/sanitize.php';

$fileJson=JSONReader('./dataset/users-management-system.json');



/*$nomeSanificato=sanitizeName($_GET['nome']);
$cognomeSanificato=sanitizeName($_GET['cognome']);*/




$OggettiJson=[];


foreach ($fileJson as $value) 
{
    $user= new User();
    $user->setUserid($value['id']);
    $user->setFirstName(sanitizeName($value['firstName']));
    $user->setLastName(sanitizeName($value['lastName']));
    $user->setEmail($value['email']);
    $user->setBirthday($value['birthday']);

  
    $OggettiJson[]=$user;
}


if (isset($_GET['nome'])&& trim($_GET['nome']) !== '')
{
    $name=sanitizeName($_GET['nome']);
    $OggettiJson=array_filter($OggettiJson , searchTextNome($name));
}
else
{
    $name='';
}

if (isset($_GET['cognome'])&& trim($_GET['cognome']) !== '')
{
    $surname=sanitizeName($_GET['cognome']);
    $OggettiJson=array_filter($OggettiJson , searchTextCognome($surname));
}
else
{
    $surname='';
}

if (isset($_GET['email'])&& trim($_GET['email']) !== '')
{
    $email=sanitizeName($_GET['email']);
    $OggettiJson=array_filter($OggettiJson , searchTextEmail($email));
}
else
{
    $email='';
}

if (isset($_GET['eta'])&& trim($_GET['eta']) !== '')
{
    $age=$_GET['eta'];
    $OggettiJson=array_filter($OggettiJson , searchTexteta($age));
}
else
{
    $age='';
}





?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
        input.form-control {
            padding: 2px;
            line-height: 100%;
            font-size: 1.5rem;
        }
    </style>
</head>

<body>
    <header class="container-fluid bg-secondary text-light p-2">
        <div class="container">
            <h1 class="display-3 mb-0">
                User management system
            </h1>
            <h2 class="display-6">user list</h2>
        </div>
    </header>
    <div class="container">
        <form action="index.php" method="GET">
        <table class="table">
            <tr>
                <th>id</th>
                <th>nome</th>
                <th>cognome</th>
                <th>email</th>
                <th cellspan="2">età</th>
            </tr>
            <tr>
                <th>
                    <input class="form-control" type="text" name="id" >
                </th>

                <th>
                    <input class="form-control" type="text" name="nome" value="<?=$name?>">
                </th>

                <th>
                    <input class="form-control" type="text" name="cognome" value="<?= $surname?>">
                </th>

                <th>
                    <input class="form-control" type="text" name="email" value="<?=$email?>">
                </th>

                <th>
                    <input class="form-control" type="text" name="eta" value="<?= $age?>">
                </th>
                <th>
                    <button type="submit" class="btn btn-primary">cerca</button>
                </th>
            </tr>
            </form>
            <?php foreach ($OggettiJson as $key => $value) {?>

            <tr>
                <td><?= $value->getUserId() ?></td>
                <td><?= $value->getFirstName() ?></td>
                <td><?= $value->getLastName()?></td>
                <td><?= $value->getEmail() ?></td>
                <td><?= $value->GetAge() ?></td>
            </tr>

           <?php  }   ?>
            
        </table>
    </div>
</body>

</html>