<?php
    $dataArr = [];
    $conn = mysqli_connect("localhost","root","123456","yesschool");
    if(!$conn) {
        echo 
            "<script>
            if(!alert('연결에 실패하였습니다 :( ')) {
                document.location='YesSchoolMain.php';
            };
            </script>";
    } else {
        $sql = "
            SELECT *
            FROM yesschool.students;
        ";
        $result = mysqli_query($conn, $sql);
        while($data = mysqli_fetch_array($result)) {
            $num = $data['student_num'];
            $name = $data['NAME'];
            $kor = $data['KOREAN'];
            $eng = $data['ENGLISH'];
            $math = $data['MATH'];
            $sum = $kor + $eng + $math;
            $avg = round($sum / 3);

            $dataArr[] = [
                "num" => $num,
                "name" => $name,
                "kor" => $kor,
                "eng" => $eng,
                "math" => $math,
                "sum" => $sum,
                "avg" => $avg
            ];
        }
        
        foreach($dataArr as $arr) {
            echo "<tr>";
            foreach($arr as $val) {
                echo "<td>";
                echo $val;
                echo "</td>";
            }
            echo "<td>
                    <div class='list-btn-wrapper'>
                        <button class='edit-btn'>수정</button>
                        <button class='del-btn'>삭제</button>
                    </div>
                  </td>";
            echo "</tr>";
        }
    }
    mysqli_close($conn);
?>