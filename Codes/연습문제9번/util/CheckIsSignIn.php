<?php
    if(!isset($_COOKIE['id'])) {
        echo
        "<script>
        if(!alert('로그인이 필요한 서비스 입니다 :( ')) {
            document.location='../View/YesSchoolSignIn.php';
        };
        </script>";
    }
?>