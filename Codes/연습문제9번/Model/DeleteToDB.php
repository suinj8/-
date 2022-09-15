<?php
    $num = $_GET['num'];
    
    $conn = mysqli_connect("localhost","root","123456","yesschool");
    if(!$conn) {
        echo 
        "<script>
        if(!alert('연결에 실패하였습니다 :( ')) {
            document.location='../View/YesSchoolMain.php';
        };
        </script>";
    } else {
        $sql = "
            DELETE FROM YESSCHOOL.STUDENTS
            WHERE student_num=".$num.";";
        
        if(mysqli_query($conn, $sql) && mysqli_affected_rows($conn) === 1){
            echo
            "<script>
            if(!alert('정상적으로 삭제되었습니다 :) ')) {
                document.location='../View/YesSchoolMain.php';
            };
            </script>";
        } else {
            echo
            "<script>
            if(!alert('에러가 발생했습니다 :( ')) {
                document.location='../View/YesSchoolMain.php';
            };
            </script>";
        }
    }

    mysqli_close($conn);
?>