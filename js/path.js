function loadStudentsView(){
    $.ajax({url: "views/students.html",
        dataType: "html",
        success: function(response) {
            $('#mainBody').html(response);
        }
    });
}
function loadImportView(){
    $.ajax({url: "views/importData.html",
        dataType: "html",
        success: function(response) {
            $('#mainBody').html(response);
        }
    });
}
function loadSmtpSettings(){
    $.ajax({url: "views/smtpSettings.html",
        dataType: "html",
        success: function(response) {
            $('#mainBody').html(response);
        }
    });
}
function loadMailPage(){
    $.ajax({url: "views/mailPage.html",
        dataType: "html",
        success: function(response) {
            $('#mainBody').html(response);
        }
    });
}
function loadPasswordPage(){
    $.ajax({url: "views/passwordSettings.html",
        dataType: "html",
        success: function(response) {
            $('#mainBody').html(response);
        }
    });
}