<?php
    header('Content-Type: text/html; charset=utf-8');
    switch ($_GET['function']){
        case 'getStudents':{getStudents(); break;}
        case 'addStudents': {addStudents(); break;}
        case 'updateStudents': {updateStudents(); break;}
        case 'deleteStudents': {deleteStudents(); break;}
    }
    function getStudents(){
        require '../config/db.php';
        $link = mysqli_connect($host,$user,$password,$db_name);
        mysqli_query($link,"SET NAMES 'utf8';");
        mysqli_query($link,"SET CHARACTER SET 'utf8';");
        mysqli_query($link,"SET SESSION collation_connection = 'utf8_general_ci';");
        $query = "SELECT * FROM `students` where state = 0 ";
        $result1 = mysqli_query($link,$query);
        $result = $result1->fetch_all();
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
    function addStudents(){
        $name = $_POST['name'];
        $lastName = $_POST['lastName'];
        $mail = $_POST['mail'];
        $patronymic = $_POST['patronymic'];
        $gender = $_POST['gender'];
        $birthday = $_POST['birthday'];
        if (isset($name)){
            require '../config/db.php';
            $link = mysqli_connect($host,$user,$password,$db_name);
            mysqli_query($link,"SET NAMES 'utf8';");
            mysqli_query($link,"SET CHARACTER SET 'utf8';");
            mysqli_query($link,"SET SESSION collation_connection = 'utf8_general_ci';");
            $query = "INSERT INTO `students`(`mail`, `name`, `lastName`, `patronymic`, `gender`,`birthday`, `state`) VALUES ('$mail','$name','$lastName','$patronymic',' $gender ','$birthday',0)";
            $result1 = mysqli_query($link,$query);
            $result1 = array('answer'=> $query);
            echo json_encode($result1, JSON_UNESCAPED_UNICODE);
        }
    }
    function updateStudents(){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $lastName = $_POST['lastName'];
        $mail = $_POST['mail'];
        $patronymic = $_POST['patronymic'];
        $gender = $_POST['gender'];
        $birthday = $_POST['birthday'];
        if (isset($name)){
            require '../config/db.php';
            $link = mysqli_connect($host,$user,$password,$db_name);
            mysqli_query($link,"SET NAMES 'utf8';");
            mysqli_query($link,"SET CHARACTER SET 'utf8';");
            mysqli_query($link,"SET SESSION collation_connection = 'utf8_general_ci';");
            $query = "UPDATE `students` SET `mail`='$mail',`name`='$name',`lastName`='$lastName',`patronymic`='$patronymic',`gender`='$gender', `birthday` = '$birthday' WHERE `id` = '$id'";
            $result1 = mysqli_query($link,$query);

        }
    }
    function deleteStudents(){
        require '../config/db.php';
        $link = mysqli_connect($host,$user,$password,$db_name);
        $id = $_POST['id'];
        $query = "UPDATE `students` SET `state` = 1 WHERE `id` = '$id' ";
        $result = mysqli_query($link,$query);
        $result1 = array('answer'=>'успешно');
        echo json_encode($result1, JSON_UNESCAPED_UNICODE);
    }
