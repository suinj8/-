<!-- 
    PHP실습문제 9번
    예스스쿨 로그인 확인 
    비밀번호를 대조하고 로그인 성공 시
    id를 쿠키로 가지고 있으면서 로그인 유지에 사용
-->

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $pw = $_POST['pw'];

        include('../util/MD5Converter.php');
        $pw = ConvertToMD5($pw);

        $conn = mysqli_connect("localhost","root","123456","yesschool");
        if(!$conn) {
            echo 
            "<script>
            if(!alert('연결에 실패하였습니다 :( ')) {
                document.location='../View/YesSchoolSignIn.php';
            };
            </script>";
        } else {
            $sql = '
                SELECT PW FROM YESSCHOOL.ADMIN
                WHERE ID ="'.$id.'";';

            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            if($row['PW'] === $pw) {
                setcookie("id", $id, time() + 3600,'/');
                echo
                "<script>
                if(!alert('로그인에 성공하였습니다 :) ')) {
                    document.location='../View/YesSchoolMain.php';
                };
                </script>";
            } else {
                echo
                "<script>
                if(!alert('ID나 PW를 확인해주세요 :( ')) {
                    document.location='../View/YesSchoolSignIn.php';
                };
                </script>";
            }
        }

        mysqli_close($conn);
    }
?>