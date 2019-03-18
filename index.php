<!doctype html>
<html lang="en">
  <head>
  <meta http-equiv="refresh" content="30">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MARTA is SMARTA</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Barlow:400,700" rel="stylesheet">
<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
<style>
      body {
          background-color: #000000;
          color: #FFFFFF;
  font-family: 'Barlow', sans-serif !important;
}
ul {
    list-style-type: none;
    padding-left: 0;
}
li {
    margin-bottom: 5px;
    font-size: 40px;
}
img.line {
    width: 40px;
}
h1 {
    font-size: 50px;
    font-weight: bold;
}
.container {
    margin-left: 47px;
}
    </style>
  </head>
  <body>

  <img style="width: 500px;" src="img/logo.png" />

  <div class="container">

<?php

function line($color) {
    if ($color == "RED") {
        return '<img class="line" src="img/red.png" />';
    } elseif ($color == "GOLD") {
        return '<img class="line" src="img/gold.png" />';
    } elseif ($color == "GREEN") {
        return '<img class="line" src="img/green.png" />';
    } elseif ($color == "BLUE") {
        return '<img class="line" src="img/blue.png" />';
    } else {
        return '<img class="line" src="img/question.png" />';
    }
}

$marta_url = file_get_contents('http://developer.itsmarta.com/RealtimeTrain/RestServiceNextTrain/GetRealtimeArrivals?apikey=1b64d6ee-e95c-4a80-9d8c-7805f140d661');
$marta = json_decode($marta_url, TRUE);

echo "<h1>Northbound</h1>";
echo "<ul>";
foreach ($marta as $train) {
    if ($train["STATION"] == "ARTS CENTER STATION" && $train["DIRECTION"] == "N") {
        echo "<li>" . line($train["LINE"]) . " " . $train["DESTINATION"] . " -- " . $train["WAITING_TIME"] . "</li>";
    }
}
echo "</ul>";

echo "<h1>Southbound</h1>";
echo "<ul>";
foreach ($marta as $train) {
    if ($train["STATION"] == "ARTS CENTER STATION" && $train["DIRECTION"] == "S") {
        echo "<li>" . '<img class="line" src="img/airplane.png" />' . " " . $train["DESTINATION"] . " -- " . $train["WAITING_TIME"] . "</li>";
    }
}
echo "</ul>";
?>
</div>
</body>
</html>