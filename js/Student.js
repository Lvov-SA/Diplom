class Student {
    id;
    mail;
    name;
    lastName;
    patronymic;
    gender;
    birthday;
    constructor(data) {
        this.id = data[0];
        this.mail = data[1];
        this.name = data[2];
        this.lastName = data[3];
        this.patronymic = data[4];
        this.gender = data[5];
        this.birthday = data[6];
        return this;
    }

    getRow() {
        var studentRow = document.createElement('tr');
        var idColumn = document.createElement('td');
        idColumn.innerHTML = this.id;

        var mailColumn = document.createElement('td');
        var mailVal = document.createElement('input');
        mailVal.classList.add('table');
        mailVal.setAttribute("type", "text");
        $(mailVal).val(this.mail);
        $(mailColumn).append(mailVal);

        var nameColumn = document.createElement('td');
        var nameVal = document.createElement('input');
        nameVal.setAttribute("type", "text");
        $(nameVal).val(this.name);
        $(nameColumn).append(nameVal);
        nameVal.classList.add('table');
        var lastNameColumn = document.createElement('td');
        var lastNameVal = document.createElement('input');
        lastNameVal.setAttribute("type", "text");
        $(lastNameVal).val(this.lastName);
        $(lastNameColumn).append(lastNameVal);
        lastNameVal.classList.add('table');
        var patronymicColumn = document.createElement('td');
        var patronymicVal = document.createElement('input');
        patronymicVal.setAttribute("type", "text");
        $(patronymicVal).val(this.patronymic);
        $(patronymicColumn).append(patronymicVal);
        patronymicVal.classList.add('table');
        var birthdayColumn = document.createElement('td');
        var birthdayVal = document.createElement('input');
        birthdayVal.setAttribute("type", "date");
        $(birthdayVal).val(this.birthday);
        $(birthdayColumn).append(birthdayVal);
        birthdayVal.classList.add('table');
        var genderColumn = document.createElement('td');
        var genderM = document.createElement('input');
        genderM.setAttribute("type", "radio");
        var nameOfGroupGender1 = Math.random(69999);
        var nameOfGroupGender = 'gender' + nameOfGroupGender1.toString();
        genderM.setAttribute("name", nameOfGroupGender);
        var genderW = document.createElement('input');
        genderW.setAttribute("type", "radio");
        genderW.setAttribute("name", nameOfGroupGender);
        if (this.gender == 0) genderM.setAttribute("checked", true);
        else genderW.setAttribute("checked", true);
        $(genderColumn).append(genderM);
        $(genderColumn).append('M');
        $(genderColumn).append(genderW);
        $(genderColumn).append('Ж');
        $(studentRow).append(idColumn);
        $(studentRow).append(mailColumn);
        $(studentRow).append(nameColumn);
        $(studentRow).append(lastNameColumn);
        $(studentRow).append(patronymicColumn);
        $(studentRow).append(birthdayColumn);
        $(studentRow).append(genderColumn);
        var buttonColumn = document.createElement('td');
        var deleteItmem = document.createElement("input");
        deleteItmem.setAttribute("type", "button");
        let deleteId = this.id;
        deleteItmem.setAttribute("value", "Удалить");
        $(deleteItmem).click(function () {
            if (confirm('Вы уверены, что хотите удалить запись номер ' + deleteId + '?')) {

                var data = new FormData();
                data.append('id', deleteId);
                $.ajax({
                    url: 'controllers/student.php?function=deleteStudents',
                    type: 'POST',
                    data: data,
                    dataType: 'json',
                    processData: false, // Не обрабатываем файлы (Don't process the files)
                    contentType: false, // Так jQuery скажет серверу что это строковой запрос
                    success: function (result, textStatus, jqXHR) {
                        console.log(result)
                        $.ajax({
                            url: "views/students.html",
                            dataType: "html",
                            success: function (response) {
                                $('#mainBody').html('');
                                $('#mainBody').html(response);
                            }
                        });
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log('ОШИБКИ AJAX запроса: ' + textStatus);
                    }
                });
            }
        });
        $(buttonColumn).append(deleteItmem);
        var updateItmem = document.createElement("input");
        updateItmem.setAttribute("type", "button");
        updateItmem.setAttribute("value", "Сохранить");
        $(updateItmem).click(function () {
            if ($(nameVal).val() != null && $(patronymicVal).val() != null && $(lastNameVal).val() != null && $(mailVal).val().indexOf("@") > -1 && ($(genderM).prop("checked") || $(genderW).prop("checked"))) {
                if (confirm('Вы уверены, что хотите внести изменения вы запись номер ' + deleteId + '?')) {
                    var data = new FormData();
                    data.append('id', deleteId);
                    data.append('mail', $(mailVal).val());
                    data.append('name', $(nameVal).val());
                    data.append('lastName', $(lastNameVal).val());
                    data.append('patronymic', $(patronymicVal).val());
                    data.append('birthday', $(birthdayVal).val());
                    if ($(genderM).prop("checked")) data.append('gender', '0');
                    else data.append('gender', '1');
                    $.ajax({
                        url: 'controllers/student.php?function=updateStudents',
                        type: 'POST',
                        data: data,
                        cache: false,
                        dataType: 'json',
                        processData: false, // Не обрабатываем файлы (Don't process the files)
                        contentType: false, // Так jQuery скажет серверу что это строковой запрос
                        success: function (result, textStatus, jqXHR) {
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log('ОШИБКИ AJAX запроса: ' + textStatus);
                        }
                    });
                }
            } else {
                alert('Проверьте правильность заполнения форм');
            }
        });
        $(buttonColumn).append(updateItmem);
        $(studentRow).append(buttonColumn);
        return studentRow;
    }
    saveStudent(){
        if (this.mail != null && this.patronymic != null && this.lastName != null && this.mail.indexOf("@") > -1 && (this.gender == 'м' || this.gender == 'ж') && this.birthday != null) {

            var data = new FormData();
            data.append('mail', this.mail);
            data.append('name', this.name);
            data.append('lastName', this.lastName);
            data.append('patronymic', this.patronymic);
            data.append('birthday', this.birthday);
            console.log('Проверка пройдена: '+this.mail);
            if (this.gender = 'м') data.append('gender', 0);
            else data.append('gender', 1);
            $.ajax({
                url: 'controllers/student.php?function=addStudents',
                type: 'POST',
                data: data,
                cache: false,
                dataType: 'json',
                processData: false, // Не обрабатываем файлы (Don't process the files)
                contentType: false, // Так jQuery скажет серверу что это строковой запрос
                success: function (result, textStatus, jqXHR) {

                    console.log(result.answer)
                },
                error: function (jqXHR, textStatus, errorThrown) {

                    console.log('Ошибка записи ' + this.mail + 'text status: '+ textStatus)
                }
            });
        }
        else{
            console.log('Проверьте формат записи студента:'+ this.mail);
        }
    }
}