<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Mailer</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="js/jQuery.js"></script>
    <script src="js/path.js"></script>
    <script src="./js/Student.js"></script>
    <script src="./js/readFromXlsx.js"></script>
</head>
<style>
    .aOn:hover{
        background-color: rgb(164, 76, 255);
        transition: 1s;
    }
</style>
<div class="sidenav">
    <a class="aOn" onClick = 'loadStudentsView()'>Слушатели ДПО</a>
    <a class="aOn" onClick = 'loadImportView()'>Импорт данных</a>
    <a class="aOn" onclick="loadMailPage()">Рассылки</a>
    <a class="aOn" onclick="loadPasswordPage()">Настройка доступа</a>
    <a class="aOn" onClick = 'loadSmtpSettings()'>Настройка SMTP</a>
</div>

<div  class="main" id = 'mainBody'>
    <h2 style="margin-top: 10%" align="center">Добро пожаловать!</h2>

</div>
</html>

