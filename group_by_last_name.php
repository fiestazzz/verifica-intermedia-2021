<?php
require './lib/GetContentJson.php';
require './class/User.php';
require './lib/funzioneCreaOggetti.php';
require './lib/sanitize.php';
require './lib/searchFunctions.php';

$fileJson=JSONReader('./dataset/users-management-system.json');
$Oggetti=UserFactory($fileJson);

/*function compare($x, $y)
{
  if ( $x->lastName == $y->lastName )
    return 0;
  else if ( $x->getLastName() < $y->getLastName())
    return -1;
  else
    return 1;
}
 
$ordinati= usort($Oggetti , 'compare');*/

$OggettiRaggruppati = array();
foreach($Oggetti as $value)
{
    if(!isset($OggettiRaggruppati[$value->getLastName()]))
    {
         $OggettiRaggruppati[$value->getLastName()] = array();
    }

    $OggettiRaggruppati[$value->getLastName()][] = $value;
}

//print_r($OggettiRaggruppati);
$lettere=["A" , "B" , "C" , "D" , "E" , "F" , "G" , "H" , "I"];

foreach ($lettere as $key => $value) 
{
    $OggettiRaggruppati=array_filter($OggettiRaggruppati , Ordina($value));
}

print_r($OggettiRaggruppati);




?>


<!DOCTYPE html>
<html lang="en">

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
            <h2 class="display-6">User list</h2>
        </div>
    </header>
    <div class="container">
        <table class="table">
            <tr>
                <th>id</th>
                <th>cognome</th>
                <th>nome</th>
                <th>email</th>
                <th>età</th>
            </tr>
            <?php foreach ($OggettiRaggruppati as $key => $value) {?>
                <tr>
                <th cellspan="5" class="text-align-left display-6">
                B
                </th>
            </tr>
            <tr>
                <td><?=$value->getUserId()?></td>
                <td><?=$value->getLastName()?></td>
                <td><?=$value->getFirstName()?></td>
                <td><?=$value->getEmail()?></td>
                <td><?=$value->GetAge()?></td>
            </tr>

            <?php } ?>
           
            <tr>
                <td>25</td>
                <td>Augusto</td>
                <td>Mino</td>
                <td>minoaugusto@email.com</td>
                <td>12 </td>
            </tr>
            <tr>
                <th cellspan="5" class="text-align-left display-6">
                R
                </th>
            </tr>
            <tr>
                <td>10</td>
                <td>Rossi</td>
                <td>Mario</td>
                <td>mariorossi@email.com</td>
                <td>15 </td>
            </tr>
            <tr>
                <td>11</td>
                <td>Rossi</td>
                <td>Mino</td>
                <td>minorossi@email.com</td>
                <td>20 </td>
            </tr>
        </table>
    </div>
</body>

</html>