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

    <div class="form-container">
        <h2>예약 조회</h2>
        <?php
        // reservation-number를 GET으로 받아옴
        $reservation_number = $_GET["reservation-number"];

        // 데이터베이스 연결
        $servername = "localhost";
        $username = "lapi";
        $password = "1234";
        $dbname = "test";

        // 데이터베이스 연결 및 SELECT 쿼리 실행
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("데이터베이스 연결에 실패했습니다: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM reservation WHERE reservation_number = '$reservation_number'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<th>이름</th>";
                echo "<td>" . $row["name"] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>예약 여부</th>";
                echo "<td>예약 완료</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>날짜</th>";
                echo "<td>" . $row["date"] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>시간</th>";
                echo "<td>" . $row["time"] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>휴대폰 번호</th>";
                echo "<td>" . $row["phone_number"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "<br>";
        } else {
            echo "<p>예약 정보를 찾을 수 없습니다.</p>";
        }

        $conn->close();
        ?>
        <form action="index.html">
            <input type="submit" value="돌아가기">
        </form>
    </div>
</body>
</html>
