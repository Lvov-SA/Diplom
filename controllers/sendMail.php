<?php
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


//Получение настроек SMTP
$xml = simplexml_load_file("../config/smtpConfig.xml");
$host = $xml->host;
$port =  $xml->port;
$login = $xml->mail;
$password = $xml->password;
echo $host.' '.$port.' '.$login.' '.$password;
$mail = new PHPMailer(true);
//code to UTF 8
$mail->CharSet = 'utf-8';
//Enable SMTP debugging.
$mail->SMTPDebug = 3;
//Set PHPMailer to use SMTP.
$mail->isSMTP();
//Set SMTP host name
$mail->Host = $host;

//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;
//Provide username and password
$mail->Username = $login;
$mail->Password = $password;
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";
//Set TCP port to connect to
$mail->Port = $port;

$mail->From = $login;
$mail->FromName = "Бот рассыльщик";
$mail->isHTML(true);
if (!empty( $_POST )){
    $sub = $_POST['subject'];
    $mail->Subject = $sub;
//загрузка шаблона
}
else{
    $mail->Subject = 'Тема';
}

$fd = file_get_contents("../config/shablon.html") or die("не удалось открыть файл");
$bodyText = '';
echo $fd;
$mail->AltBody = "This is the plain text version of the email content";
require '../config/db.php';
$link = mysqli_connect($host, $user, $password, $db_name);
mysqli_query($link,"SET NAMES 'utf8';");
mysqli_query($link,"SET CHARACTER SET 'utf8';");
mysqli_query($link,"SET SESSION collation_connection = 'utf8_general_ci';");
$query = "SELECT * FROM `students` where state = 0 ";
$result1 = mysqli_query($link, $query);
for ($row_no = 0; $row_no < $result1->num_rows; $row_no++) {

    $result1->data_seek($row_no);
    $row = $result1->fetch_assoc();

    if (!empty( $_POST)){
        if ($row['gender'] == 0) {
            $bodyText = str_replace('<div id="helloStudent"></div>', '<div id="helloStudent">Уважаемый ' . $row['name'] . ' ' . $row['patronymic'] . ' !</div>', $fd);
        } else {
            $bodyText = str_replace('<div id="helloStudent"></div>', '<div id="helloStudent">Уважаемая ' . $row['name'] . ' ' . $row['patronymic'] . ' !</div>', $fd);
        }
        $bodyText = str_replace('<div id="text"></div>', '<div id="text">'.$_POST['text'].'</div>', $bodyText);
    }
    else{
        $bodyText = str_replace('<div id="helloStudent"></div>', '<div id="helloStudent">Уважаемый ' . $row['name'] . ' ' . $row['patronymic'] . ' !</div>', $fd);
        $bodyText = str_replace('<div id="text"></div>', '<div id="text">Очень важный текст</div>', $bodyText);
    }
    $bodyText = str_replace('<a id="canselMail"> </a>', '<a href="https://messages.ucmpt.ru/index.php?mail='.$row['id'].'"> Отказаться от рассылки</a>', $bodyText);
    $mail->Body = $bodyText;
    $mail->addAddress($row['mail'], $row['name'] . ' ' . $row['patronymic']);
    try {
        $mail->send();
        echo "Message has been sent successfully";
    }
    catch(Exception $e){
        echo "Ошибка отправки".$e;
        $result = array('answer'=>'ошибка: '.$e);
        echo json_encode($result);
    }
    $mail->ClearAddresses();
    if(bcmod($row_no,50) == 0){
        sleep(30);
    }
}


?>