<head>
    <link rel="shortcut icon" href="media/logo.ico" type="image/x-icon">
</head>
<?php
if(isset($_GET['auto'])){
$function = $_GET['auto'];
if($function == file_get_contents('config/password.txt')) {
    require 'controllers/main.php';
}
else{
    echo '<html>
<body>
    <div style="
     width: 100%;
    height: 50%;
    top: 0;
    left: 0;
    display: flex;
    align-items: center;
    align-content: center;
    justify-content: center;
    overflow: auto;   "
    >
        <img src="media/logo.jpg" style="width: 25%">

    </div>
    <p align="center"  style="font-weight: bold;font-size:30px; font-family: Arial">Ошибка доступа в сервис, обратитесь к администратору</p>
</body>
</html>';
}
}
else if(isset($_GET['mail'])){
    require 'config/db.php';
    $link = mysqli_connect($host, $user, $password, $db_name);
    $id = $_GET['mail'];
    $query = "UPDATE `students` SET `state` = 1 WHERE `id` = '$id' ";
    $result = mysqli_query($link, $query);
    echo '<html>
<body>
    <div style="
     width: 100%;
    height: 50%;
    top: 0;
    left: 0;
    display: flex;
    align-items: center;
    align-content: center;
    justify-content: center;
    overflow: auto;   "
    >
        <img src="media/logo.jpg" style="width: 25%">

    </div>
    <p align="center"  style="font-weight: bold;font-size:30px; font-family: Arial">Вы успешно отписались от рассылки!</p>
</body>
</html>';
}
else{
    echo '<html>
<body>
    <div style="
     width: 100%;
    height: 50%;
    top: 0;
    left: 0;
    display: flex;
    align-items: center;
    align-content: center;
    justify-content: center;
    overflow: auto;   "
    >
        <img src="media/logo.jpg" style="width: 25%">

    </div>
    <p align="center"  style="font-weight: bold;font-size:30px; font-family: Arial">Ошибка доступа в сервис, обратитесь к администратору</p>
</body>
</html>';
}
?>