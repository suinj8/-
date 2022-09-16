$(document).ready(function() {
    $("#form").submit(function(e) {
        if(!checkID($('#inputID').val())) {
            $('#inputID').val("");
            $('#inputPW').val("");
            alert("유효하지 않은 ID입니다 :(");
            $('#inputID').css("borderColor","red");
            e.preventDefault();
        } else {
            $('#inputID').css("borderColor","black");
            if(!checkPW($('#inputPW').val())) {
                $('#inputID').val("");
                $('#inputPW').val("");
                alert("유효하지 않은 PW입니다 :(");
                $('#inputPW').css("borderColor","red");
                e.preventDefault();
            }
        }
    })
});

// 최소 4자, 최소 하나의 문자 및 하나의 숫자
const idVal = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4,}$/;
// 최소 8자, 최소 하나의 문자, 하나의 숫자, 하나의 특수문자
const pwVal = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/;

function checkID(id) {
    if(idVal.test(id)) return true;
    else return false;
}
function checkPW(pw) {
    if(pwVal.test(pw)) return true;
    else return false;
}