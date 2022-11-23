<?php

switch ($_GET['function']) {
    case 'writeSettings':
    {
        writeSettings();
        break;
    }
    case 'readSettings':
    {
        readSettings();
        break;
    }
}
function writeSettings()
{
    $dom = new domDocument("1.0", "utf-8"); // Создаём XML-документ версии 1.0 с кодировкой utf-8
    $root = $dom->createElement("smtpSetting");
    $dom->appendChild($root);
    $host = $dom->createElement('host');
    $host->textContent = $_POST['host'];
    $root->appendChild($host);
    $port = $dom->createElement('port');
    $port->textContent = $_POST['port'];
    $root->appendChild($port);
    $mail = $dom->createElement('mail');
    $mail->textContent = $_POST['mail'];
    $root->appendChild($mail);
    $password = $dom->createElement('password');
    $password->textContent = $_POST['password'];
    $root->appendChild($password);
    $dom->formatOutput = true;
    $dom->save("../config/smtpConfig.xml");
}

function readSettings()
{
    $xml = simplexml_load_file("../config/smtpConfig.xml");
    $host = $xml->host;
    $port =  $xml->port;
    $mail = $xml->mail;
    $password = $xml->password;
    $result = array('host' => $host, 'port' => $port, 'mail' => $mail, 'password' => $password);
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

?>