<?php
switch ($_GET['function']) {
    case 'shablon':
    {
        shablon();
        break;
    }
    case 'birth':
    {
        shablonBirth();
        break;
    }
    case 'newyear':
    {
        shablonNewYear();
        break;
    }
    case 'feb':
    {
        shablonFeb();
        break;
    }
    case 'mart':
    {
        shablonMart();
        break;
    }
    case 'firstmay':
    {
        shablonFirstMay();
        break;
    }
    case 'may':
    {
        shablonMay();
        break;
    }
    case 'june':
    {
        shablonJune();
        break;
    }
    case 'nov':
    {
        shablonNov();
        break;
    }
}
function shablon(){
    $fd = fopen("../config/shablon.html", 'w') or die("не удалось открыть файл");
    while (!feof($fd)) {
        fwrite($fd, $_POST['shablon']);
        fclose($fd);
    }
    fclose($fd);
}
function shablonBirth(){
    $fd = fopen("../config/holydaysShablons/birthDay.html", 'w') or die("не удалось открыть файл");
    while (!feof($fd)) {
        fwrite($fd, $_POST['shablon']);
        fclose($fd);
    }
    fclose($fd);
}
function shablonNewYear(){
    $fd = fopen("../config/holydaysShablons/newYear.html", 'w') or die("не удалось открыть файл");
    while (!feof($fd)) {
        fwrite($fd, $_POST['shablon']);
        fclose($fd);
    }
    fclose($fd);
}
function shablonFeb(){
    $fd = fopen("../config/holydaysShablons/feb.html", 'w') or die("не удалось открыть файл");
    while (!feof($fd)) {
        fwrite($fd, $_POST['shablon']);
        fclose($fd);
    }
    fclose($fd);
}
function shablonMart(){
    $fd = fopen("../config/holydaysShablons/mart.html", 'w') or die("не удалось открыть файл");
    while (!feof($fd)) {
        fwrite($fd, $_POST['shablon']);
        fclose($fd);
    }
    fclose($fd);
}
function shablonFirstMay(){
    $fd = fopen("../config/holydaysShablons/firstMay.html", 'w') or die("не удалось открыть файл");
    while (!feof($fd)) {
        fwrite($fd, $_POST['shablon']);
        fclose($fd);
    }
    fclose($fd);
}
function shablonMay(){
    $fd = fopen("../config/holydaysShablons/nMay.html", 'w') or die("не удалось открыть файл");
    while (!feof($fd)) {
        fwrite($fd, $_POST['shablon']);
        fclose($fd);
    }
    fclose($fd);
}
function shablonJune(){
    $fd = fopen("../config/holydaysShablons/june.html", 'w') or die("не удалось открыть файл");
    while (!feof($fd)) {
        fwrite($fd, $_POST['shablon']);
        fclose($fd);
    }
    fclose($fd);
}
function shablonNov(){
    $fd = fopen("../config/holydaysShablons/november.html", 'w') or die("не удалось открыть файл");
    while (!feof($fd)) {
        fwrite($fd, $_POST['shablon']);
        fclose($fd);
    }
    fclose($fd);
}
?>