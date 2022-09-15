<!-- 
    PHP실습문제 9번
    로그아웃 페이지 입니다.
    간단하게 로그인을 유지하는 userid쿠키를 제거합니다.
-->

<?php
    setcookie("id");
    echo 
        "<script>
         if(!alert('로그아웃 되었습니다 :) ')) {
            document.location='../View/YesSchoolSignIn.php';
        };
        </script>";
?>