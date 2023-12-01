<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>성결대 병원</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1><img src="sku.svg" alt="성결대학교 로고" width="60" height="60">성결대 병원</h1>

    <div class="form-container" id="result-container">
        <h2>예약 결과</h2>
        <div id="reservation-result"></div>
        <br> <!-- 여백 추가 -->
        <form action="index.html">
            <input type="submit" value="돌아가기">
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // POST 데이터를 받아와서 reservation 테이블에 삽입하는 로직 작성
        $name = $_POST["name"];
        $date = $_POST["date"];
        $time = $_POST["time"];
        $phone = $_POST["phone"];

        // reservation_number 생성
        $reservation_number = uniqid();

        // 데이터베이스 연결 및 INSERT 쿼리 실행
        $servername = "localhost";
        $username = "lapi";
        $password = "1234";
        $dbname = "test";

        // 데이터베이스 연결 및 INSERT 쿼리 실행
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("데이터베이스 연결에 실패했습니다: " . $conn->connect_error);
        }

        $sql = "INSERT INTO reservation (reservation_number, name, date, time, phone_number) VALUES ('$reservation_number', '$name', '$date', '$time', '$phone')";

        if ($conn->query($sql) === TRUE) {
            $reservationID = $conn->insert_id;
            echo "<script>";
            echo "var resultContainer = document.getElementById('reservation-result');";
            echo "resultContainer.innerHTML = '예약이 성공적으로 완료되었습니다. 예약 번호는 " . $reservation_number . "입니다.';";
            echo "resultContainer.style.color = 'green';";
            echo "</script>";
        } else {
            echo "<script>";
            echo "var resultContainer = document.getElementById('reservation-result');";
            echo "resultContainer.innerHTML = '예약에 실패했습니다. 다시 시도해주세요.';";
            echo "resultContainer.style.color = 'red';";
            echo "</script>";
        }

        $conn->close();
    }
    ?>
</body>
</html>
