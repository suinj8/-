<!-- 
    PHP실습문제 9번
    예스스쿨 데이터 업데이트
-->

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $korean = $_POST['korean'];
        $english = $_POST['english'];
        $math = $_POST['math'];
        $num = $_POST['num'];

        $conn = mysqli_connect("localhost","root","123456","yesschool");
        if(!$conn) {
            echo 
            "<script>
            if(!alert('연결에 실패하였습니다 :( ')) {
                document.location='../View/YesSchoolMain.php';
            };
            </script>";
        } else {
            $clientIP = $_SERVER['REMOTE_ADDR'];
            $clientID = $_COOKIE['id'];
            $sql = "
                UPDATE yesschool.students
                SET NAME = '".$name."', KOREAN = ".$korean.", ENGLISH = ".$english.", MATH = ".$math.", POSTTIME = current_timestamp(), IP = '".$clientIP."', REPRESENTATIVE = '".$clientID."' 
                WHERE student_num = ".$num.";";

            if(mysqli_query($conn, $sql)) {
                echo
                "<script>
                if(!alert('데이터가 수정되었습니다 :) ')) {
                    document.location='../View/YesSchoolMain.php';
                };
                </script>";
            } else {
                echo
                "<script>
                if(!alert('데이터 수정에 실패했어요 :( ')) {
                    document.location='../View/YesSchoolMain.php';
                };
                </script>";
            }
        }

        mysqli_close($conn);
    }
?>