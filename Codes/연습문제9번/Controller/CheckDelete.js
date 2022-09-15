$(document).ready(function() {
    $(".del-btn").on("click", function(e) {
        let num = $(this).parents('tr').children().first(); 
        if(confirm("정말로 삭제 하시겠습니까?")) {
            location.href = `../Model/DeleteToDB.php?num=${num.text()}`;
        } 
    });
});