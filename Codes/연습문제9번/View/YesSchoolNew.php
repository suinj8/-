<!-- 
    PHP실습문제 9번
    예스스쿨 새로운 학생 추가 페이지
    입력받은 데이터를
-->

<?php require('../util/CheckIsSignIn.php'); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP실습문제 9번 구현</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="YesSchool.css">
        <title>YesSchool New</title>

    </head>
    <body>
        <h1 class="header">NEW</h1>
        <div class="container">
            <form method="post" action="../Model/NewToDB.php">
                <div class="mb-3">
                    <label for="name" class="form-label">이름 *</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="이름을 입력해주세요 *">
                </div>
                <div class="mb-3">
                    <label for="korean" class="form-label">국어점수</label>
                    <input type="text" class="form-control" id="korean" name="korean" placeholder="국어점수를 입력해주세요 *">
                </div>
                <div class="mb-3">
                    <label for="English" class="form-label">영어점수</label>
                    <input type="text" class="form-control" id="english" name="english" placeholder="영어점수를 입력해주세요 *">
                </div>
                <div class="mb-3">
                    <label for="math" class="form-label">수학점수</label>
                    <input type="text" class="form-control" id="math" name="math" placeholder="수학점수를 입력해주세요 *">
                </div>
                <div class="btn-wrapper">
                    <button type="button" class="btn leftBtn" onclick="location.href='YesSchoolMain.php'">Cancel</button>
                    <button type="submit" class="btn rightBtn">Insert</button>
                </div>
            </form>
        </div>
    </body>
</html>