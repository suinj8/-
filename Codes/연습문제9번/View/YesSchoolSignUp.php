<!-- 
    PHP실습문제 9번
    예스스쿨 회원가입 페이지
-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP실습문제 9번 구현</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="../util/CheckValidation.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="YesSchool.css">
        <title>YesSchool SignUp</title>
    </head>
    <body>
        <h1 class="header">Sign Up</h1>
        <div class="container">
            <form method="post" id="form" action="../Model/SignUpToDB.php">
                <div class="mb-3">
                    <label for="inputID" class="form-label">ID</label>
                    <input type="text" class="form-control" id="inputID" name="id" placeholder="ID를 입력해주세요 *">
                </div>
                <div class="mb-3">
                    <label for="inputPW" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPW" name="pw" placeholder="PassWord를 입력해주세요 *">
                </div>
                <div class="button-wrapper">
                    <button type="button" class="btn leftBtn" onclick="location.href='YesSchoolSignIn.php'">Cancel</button>
                    <button type="submit" class="btn rightBtn">CREATE ACCOUNT</input>
                </div>
            </form>
        </div>
    </body>
</html>