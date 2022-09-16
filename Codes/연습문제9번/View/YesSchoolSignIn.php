<!-- 
    PHP실습문제 9번
    예스스쿨 로그인 페이지
-->

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

        <title>YesSchool SignIn</title>
    </head>
    <body>
        <h1 class="header">Yes School</h1>
        <h2 class="subHeader">Sign In </h2>
        <div class="container">
            <form method="post" action="../Model/SignInToDB.php">
                <div class="mb-3">
                    <label for="inputID" class="form-label">ID</label>
                    <input type="text" class="form-control" id="inputID" name="id" placeholder="ID를 입력해주세요 *">
                </div>
                <div class="mb-3">
                    <label for="inputPW" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPW" name="pw" placeholder="PassWord를 입력해주세요 *">
                </div>
                <div class="btn-wrapper">
                    <button type="button" class="btn leftBtn" onclick="location.href='YesSchoolSignUp.php'">Sign Up</button>
                    <button type="submit" class="btn rightBtn">Sign In</button>
                </div>
            </form>
        </div>
    </body>
</html>