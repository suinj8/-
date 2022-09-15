<?php
    $conn = mysqli_connect("localhost","root","123456","yesschool");
    if(!$conn) {
        echo 
            "<script>
            if(!alert('연결에 실패하였습니다 :( ')) {
                document.location='YesSchoolMain.php';
            };
            </script>";
    } else {
        $sql = "
            SELECT *
            FROM yesschool.students
            WHERE student_num = ".$num.";";

        $result = mysqli_query($conn, $sql);

        $data = mysqli_fetch_array($result);
        $name = $data['NAME'];
        $kor = $data['KOREAN'];
        $eng = $data['ENGLISH'];
        $math = $data['MATH'];
    }
    mysqli_close($conn);
?>
