<!-- 
    PHP실습문제 9번
    예스스쿨 회원가입 시 DB에 데이터 저장하는 페이지
-->

<?php
    include("../util/CheckValidation.php");
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $pw = $_POST['pw'];
        
        if(!checkID($id) || !checkPW($pw)) {
            echo 
            "<script>
            if(!alert('유효하지 않은 ID또는 PW입니다 :( ')) {
                document.location='../View/YesSchoolSignUp.php';
            };
            </script>";
        }

        include('../util/MD5Converter.php');
        $pw = ConvertToMD5($pw);

        $conn = mysqli_connect("localhost","root","123456","yesschool");
        if(!$conn) {
            echo 
            "<script>
            if(!alert('연결에 실패하였습니다 :( ')) {
                document.location='../View/YesSchoolSignUp.php';
            };
            </script>";
        } else {
            // ID가 중복검사
            $sql = "
                SELECT ID FROM YESSCHOOL.ADMIN
                WHERE ID = '".$id."';";

            $result = mysqli_query($conn, $sql);
            
            if(mysqli_affected_rows($conn) > 0) {
                echo
                "<script>
                if(!alert('이미 존재하는 아이디 입니다 :( ')) {
                    document.location='../View/YesSchoolSignUp.php';
                };
                </script>";
            }
            
            // 존재하지 않는 아이디라면 회원등록
            $sql = "
                INSERT INTO YESSCHOOL.ADMIN(ID, PW)
                VALUES('".$id."','".$pw."');
            ";
            if(mysqli_query($conn, $sql)) {
                echo
                "<script>
                if(!alert('회원등록에 성공하였습니다 :) ')) {
                    document.location='../View/YesSchoolSignIn.php';
                };
                </script>";
            }
        }

        mysqli_close($conn);
    }
?>