<?php
switch ($_GET['function']) {
    case 'writePassword':
    {
        writePassword();
        break;
    }
    case 'readPassword':
    {
        readSettings();
        break;
    }
}
function writePassword()
{
    $fd = fopen("../config/password.txt", 'r') or die("не удалось открыть файл");
    $password = fgets($fd);
    if($password == $_POST['password']){
        $fd = fopen("../config/password.txt", 'w') or die("не удалось открыть файл");
        fwrite($fd, $_POST['newPassword']);
        fclose($fd);
        $result = array('answer' => '1');
        echo json_encode($result );
    }
    else{
        $result = array('answer' => '0');
        echo json_encode($result );
    }
}

function readSettings()
{

}

?>