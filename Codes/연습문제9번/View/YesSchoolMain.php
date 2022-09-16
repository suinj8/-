<!-- 
    PHP실습문제 9번
    예스스쿨 메인페이지
    리스트를 보여주는 페이지
    DB로부터 데이터를 받아와 전체 출력
-->

<?php require('../Util/CheckIsSignIn.php'); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP실습문제 9번 구현</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="../Controller/ListBtnClick.js"></script>
        <script src="ListSort.js"></script>
        <script src="../Controller/CheckDelete.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="YesSchool.css">
        <title>YesSchool Main</title>
    </head>
    <body>
        <h1 class="header">List</h1>
        <div class="container">
            <div class="btn-wrapper">
                <button class="btn leftBtn" onclick="document.location='../Controller/SignOut.php'">로그아웃</button>
                <button class="btn rightBtn" onclick="location.href='YesSchoolNew.php'">NEW</button>
            </div>
            <table align="center" width="100%" id="mainTable" >
                <thead>
                    <tr>
                        <th>번호</th>
                        <th id="name">이름</th>
                        <th>국어</th>
                        <th>영어</th>
                        <th>수학</th>
                        <th id="score">총점</th>
                        <th>평균</th>
                        <th>비고</th>
                    </tr>
                </thead>
                <tbody id="list">
                    <?php include("../Model/GetAllDataFromDB.php"); ?>
                </tbody>
            </table>
        </div>
    </body>
</html>