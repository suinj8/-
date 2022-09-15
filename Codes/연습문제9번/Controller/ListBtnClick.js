$(document).ready(function() {
    $(".edit-btn").on("click", function() {
        let num = $(this).parents('tr').children().first(); 
        location.href=`YesSchoolEdit.php?num=${num.text()}`;
    })
});