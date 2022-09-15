<!-- 
    PHP실습문제 9번
    예스스쿨 데이터 입력 페이지
-->

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $korean = $_POST['korean'];
        $english = $_POST['english'];
        $math = $_POST['math'];

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
                INSERT INTO yesschool.students(NAME, KOREAN, ENGLISH, MATH, POSTTIME, IP, REPRESENTATIVE)
                VALUES ('".$name."',".$korean.",".$english.",".$math.",DEFAULT,'".$clientIP."','".$clientID."');";

            if(mysqli_query($conn, $sql)) {
                echo
                "<script>
                if(!alert('새로운 데이터가 추가되었습니다 :) ')) {
                    document.location='../View/YesSchoolMain.php';
                };
                </script>";
            } else {
                echo
                "<script>
                if(!alert('데이터 추가에 실패했어요 :( ')) {
                    document.location='../View/YesSchoolMain.php';
                };
                </script>";
            }
        }

        mysqli_close($conn);
    }
?>