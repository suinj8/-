<?php
    function checkID ($id) {
        $id = trim($id);

        // 영어소문자 , 숫자 혹은 둘 다로 이루어진 4~15자 ID
        $lowerCase = '/[a-z]/';
        $number = '/[0-9]/';

        if(strlen($id) < 4 || strlen($id) > 15) return false;
        if(!preg_match($lowerCase, $id) || !preg_match($number, $id)) return false;

        return true;
    }

    function checkPW ($pw) {
        $pw = trim($pw);

        // 영어, 숫자, 특수문자를 모두 포함하는 8~20 자 PW
        
        $english = '/[a-zA-Z]/';
        $number = '/[0-9]/';
        $special = '/[!@#$%^&*-]/';

        if(strlen($pw) < 8 || strlen($pw) > 20) return false;
        if(!preg_match($english, $pw) || !preg_match($number, $pw) || !preg_match($special, $pw)) 
            return false;

        return true;
    }

?>