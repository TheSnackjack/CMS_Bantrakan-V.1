<?php
//เชื่อมต่อฐานข้อมูล
include_once('config/data.php');

try {

    //////////////////////////////////////////////////////////////////////////////////////////////////////

    /// ภาพรวม ///

    //////////////////////////////////////////////////////////////////////////////////////////////////////


    // นับจำนวนนักเรียนทั้งหมด
    $sql_all = "SELECT COUNT(*) AS count FROM student WHERE std_status = 1";
    $stmt = $pdo->query($sql_all);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_all = $result['count'];

    // นับจำนวนนักเรียนชายทั้งหมด
    $sql_all_m = "SELECT COUNT(*) AS count FROM student WHERE std_gender = 'ช'";
    $stmt = $pdo->query($sql_all_m);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_all_m = $result['count'];

    // นับจำนวนนักเรียนหญิงทั้งหมด
    $sql_all_wm = "SELECT COUNT(*) AS count FROM student WHERE std_gender = 'ญ'";
    $stmt = $pdo->query($sql_all_wm);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_all_wm = $result['count'];

    // นับจำนวนนักเรียนที่มาเรียน
    $sql_ma = "SELECT COUNT(*) AS count FROM attendance WHERE atd_date = '$date' && atd_status = 'ม'";
    $stmt = $pdo->query($sql_ma);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_ma = $result['count'];

    // นับจำนวนนักเรียนชายที่มาเรียน
    $sql_ma_m = "SELECT COUNT(*) AS count
    FROM student s
    INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
    WHERE s.std_gender = 'ช' && a.atd_date = '$date' && a.atd_status = 'ม'";
    $stmt = $pdo->query($sql_ma_m);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_ma_m = $result['count'];

    // นับจำนวนนักเรียนหญิงที่มาเรียน
    $sql_ma_m = "SELECT COUNT(*) AS count
     FROM student s
     INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
     WHERE s.std_gender = 'ญ' && a.atd_date = '$date' && a.atd_status = 'ม'";
    $stmt = $pdo->query($sql_ma_m);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_ma_wm = $result['count'];

    // นับจำนวนนักเรียนที่ลาเรียน
    $sql_la = "SELECT COUNT(*) AS count FROM attendance WHERE atd_date = '$date' && atd_status = 'ล'";
    $stmt = $pdo->query($sql_la);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_la = $result['count'];

    // นับจำนวนนักเรียนชายที่ลาเรียน
    $sql_la_m = "SELECT COUNT(*) AS count
    FROM student s
    INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
    WHERE s.std_gender = 'ช' && a.atd_date = '$date' && a.atd_status = 'ล'";
    $stmt = $pdo->query($sql_la_m);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_la_m = $result['count'];

    // นับจำนวนนักเรียนหญิงที่ลาเรียน
    $sql_la_m = "SELECT COUNT(*) AS count
     FROM student s
     INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
     WHERE s.std_gender = 'ญ' && a.atd_date = '$date' && a.atd_status = 'ล'";
    $stmt = $pdo->query($sql_la_m);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_la_wm = $result['count'];

    // นับจำนวนนักเรียนที่ขาดเรียน
    $sql_kad = "SELECT COUNT(*) AS count FROM attendance WHERE atd_date = '$date' && atd_status = 'ข'";
    $stmt = $pdo->query($sql_kad);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_kad = $result['count'];

    // นับจำนวนนักเรียนชายที่ขาดเรียน
    $sql_kad_m = "SELECT COUNT(*) AS count
    FROM student s
    INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
    WHERE s.std_gender = 'ช' && a.atd_date = '$date' && a.atd_status = 'ข'";
    $stmt = $pdo->query($sql_kad_m);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_kad_m = $result['count'];

    // นับจำนวนนักเรียนหญิงที่ขาดเรียน
    $sql_kad_m = "SELECT COUNT(*) AS count
     FROM student s
     INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
     WHERE s.std_gender = 'ญ' && a.atd_date = '$date' && a.atd_status = 'ข'";
    $stmt = $pdo->query($sql_kad_m);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_kad_wm = $result['count'];


    //////////////////////////////////////////////////////////////////////////////////////////////////////

    /// แยกรายชั้น ///

    //////////////////////////////////////////////////////////////////////////////////////////////////////

    // นับจำนวนนักเรียน อ.2 ที่มาเรียน
    $sql_ma_o2 = "SELECT COUNT(*) AS count
    FROM student s
    INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
    WHERE s.std_class = 'อ.2' && a.atd_date = '$date' && a.atd_status = 'ม'";
    $stmt = $pdo->query($sql_ma_o2);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_ma_o2 = $result['count'];

    // นับจำนวนนักเรียน อ.2 ที่ลาเรียน
    $sql_la_o2 = "SELECT COUNT(*) AS count
     FROM student s
     INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
     WHERE s.std_class = 'อ.2' && a.atd_date = '$date' && a.atd_status = 'ล'";
    $stmt = $pdo->query($sql_la_o2);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_la_o2 = $result['count'];

    // นับจำนวนนักเรียน อ.2 ที่ขาดเรียน
    $sql_kad_o2 = "SELECT COUNT(*) AS count
    FROM student s
    INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
    WHERE s.std_class = 'อ.2' && a.atd_date = '$date' && a.atd_status = 'ข'";
    $stmt = $pdo->query($sql_kad_o2);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_kad_o2 = $result['count'];

    // นับจำนวนนักเรียน อ.3 ที่มาเรียน
    $sql_ma_o3 = "SELECT COUNT(*) AS count
     FROM student s
     INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
     WHERE s.std_class = 'อ.3' && a.atd_date = '$date' && a.atd_status = 'ม'";
    $stmt = $pdo->query($sql_ma_o3);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_ma_o3 = $result['count'];

    // นับจำนวนนักเรียน อ.3 ที่ลาเรียน
    $sql_la_o3 = "SELECT COUNT(*) AS count
      FROM student s
      INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
      WHERE s.std_class = 'อ.3' && a.atd_date = '$date' && a.atd_status = 'ล'";
    $stmt = $pdo->query($sql_la_o3);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_la_o3 = $result['count'];

    // นับจำนวนนักเรียน อ.3 ที่ขาดเรียน
    $sql_kad_o3 = "SELECT COUNT(*) AS count
     FROM student s
     INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
     WHERE s.std_class = 'อ.3' && a.atd_date = '$date' && a.atd_status = 'ข'";
    $stmt = $pdo->query($sql_kad_o3);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_kad_o3 = $result['count'];

    // นับจำนวนนักเรียน ป.1 ที่มาเรียน
    $sql_ma_p1 = "SELECT COUNT(*) AS count
     FROM student s
     INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
     WHERE s.std_class = 'ป.1' && a.atd_date = '$date' && a.atd_status = 'ม'";
    $stmt = $pdo->query($sql_ma_p1);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_ma_p1 = $result['count'];

    // นับจำนวนนักเรียน ป.1 ที่ลาเรียน
    $sql_la_p1 = "SELECT COUNT(*) AS count
      FROM student s
      INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
      WHERE s.std_class = 'ป.1' && a.atd_date = '$date' && a.atd_status = 'ล'";
    $stmt = $pdo->query($sql_la_p1);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_la_p1 = $result['count'];

    // นับจำนวนนักเรียน ป.1 ที่ขาดเรียน
    $sql_kad_p1 = "SELECT COUNT(*) AS count
     FROM student s
     INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
     WHERE s.std_class = 'ป.1' && a.atd_date = '$date' && a.atd_status = 'ข'";
    $stmt = $pdo->query($sql_kad_p1);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_kad_p1 = $result['count'];

    // นับจำนวนนักเรียน ป.2 ที่มาเรียน
    $sql_ma_p2 = "SELECT COUNT(*) AS count
     FROM student s
     INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
     WHERE s.std_class = 'ป.2' && a.atd_date = '$date' && a.atd_status = 'ม'";
    $stmt = $pdo->query($sql_ma_p2);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_ma_p2 = $result['count'];

    // นับจำนวนนักเรียน ป.2 ที่ลาเรียน
    $sql_la_p2 = "SELECT COUNT(*) AS count
      FROM student s
      INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
      WHERE s.std_class = 'ป.2' && a.atd_date = '$date' && a.atd_status = 'ล'";
    $stmt = $pdo->query($sql_la_p2);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_la_p2 = $result['count'];

    // นับจำนวนนักเรียน ป.2 ที่ขาดเรียน
    $sql_kad_p2 = "SELECT COUNT(*) AS count
     FROM student s
     INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
     WHERE s.std_class = 'ป.2' && a.atd_date = '$date' && a.atd_status = 'ข'";
    $stmt = $pdo->query($sql_kad_p2);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_kad_p2 = $result['count'];

    // นับจำนวนนักเรียน ป.3 ที่มาเรียน
    $sql_ma_p3 = "SELECT COUNT(*) AS count
     FROM student s
     INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
     WHERE s.std_class = 'ป.3' && a.atd_date = '$date' && a.atd_status = 'ม'";
    $stmt = $pdo->query($sql_ma_p3);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_ma_p3 = $result['count'];

    // นับจำนวนนักเรียน ป.3 ที่ลาเรียน
    $sql_la_p3 = "SELECT COUNT(*) AS count
      FROM student s
      INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
      WHERE s.std_class = 'ป.3' && a.atd_date = '$date' && a.atd_status = 'ล'";
    $stmt = $pdo->query($sql_la_p3);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_la_p3 = $result['count'];

    // นับจำนวนนักเรียน ป.3 ที่ขาดเรียน
    $sql_kad_p3 = "SELECT COUNT(*) AS count
     FROM student s
     INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
     WHERE s.std_class = 'ป.3' && a.atd_date = '$date' && a.atd_status = 'ข'";
    $stmt = $pdo->query($sql_kad_p3);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_kad_p3 = $result['count'];

    // นับจำนวนนักเรียน ป.4 ที่มาเรียน
    $sql_ma_p4 = "SELECT COUNT(*) AS count
     FROM student s
     INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
     WHERE s.std_class = 'ป.4' && a.atd_date = '$date' && a.atd_status = 'ม'";
    $stmt = $pdo->query($sql_ma_p4);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_ma_p4 = $result['count'];

    // นับจำนวนนักเรียน ป.4 ที่ลาเรียน
    $sql_la_p4 = "SELECT COUNT(*) AS count
      FROM student s
      INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
      WHERE s.std_class = 'ป.4' && a.atd_date = '$date' && a.atd_status = 'ล'";
    $stmt = $pdo->query($sql_la_p4);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_la_p4 = $result['count'];

    // นับจำนวนนักเรียน ป.4 ที่ขาดเรียน
    $sql_kad_p4 = "SELECT COUNT(*) AS count
     FROM student s
     INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
     WHERE s.std_class = 'ป.4' && a.atd_date = '$date' && a.atd_status = 'ข'";
    $stmt = $pdo->query($sql_kad_p4);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_kad_p4 = $result['count'];

    // นับจำนวนนักเรียน ป.5 ที่มาเรียน
    $sql_ma_p5 = "SELECT COUNT(*) AS count
          FROM student s
          INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
          WHERE s.std_class = 'ป.5' && a.atd_date = '$date' && a.atd_status = 'ม'";
    $stmt = $pdo->query($sql_ma_p5);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_ma_p5 = $result['count'];

    // นับจำนวนนักเรียน ป.5 ที่ลาเรียน
    $sql_la_p5 = "SELECT COUNT(*) AS count
           FROM student s
           INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
           WHERE s.std_class = 'ป.5' && a.atd_date = '$date' && a.atd_status = 'ล'";
    $stmt = $pdo->query($sql_la_p5);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_la_p5 = $result['count'];

    // นับจำนวนนักเรียน ป.5 ที่ขาดเรียน
    $sql_kad_p5 = "SELECT COUNT(*) AS count
          FROM student s
          INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
          WHERE s.std_class = 'ป.5' && a.atd_date = '$date' && a.atd_status = 'ข'";
    $stmt = $pdo->query($sql_kad_p5);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_kad_p5 = $result['count'];

    // นับจำนวนนักเรียน ป.6 ที่มาเรียน
    $sql_ma_p6 = "SELECT COUNT(*) AS count
          FROM student s
          INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
          WHERE s.std_class = 'ป.6' && a.atd_date = '$date' && a.atd_status = 'ม'";
    $stmt = $pdo->query($sql_ma_p6);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_ma_p6 = $result['count'];

    // นับจำนวนนักเรียน ป.6 ที่ลาเรียน
    $sql_la_p6 = "SELECT COUNT(*) AS count
           FROM student s
           INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
           WHERE s.std_class = 'ป.6' && a.atd_date = '$date' && a.atd_status = 'ล'";
    $stmt = $pdo->query($sql_la_p6);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_la_p6 = $result['count'];

    // นับจำนวนนักเรียน ป.6 ที่ขาดเรียน
    $sql_kad_p6 = "SELECT COUNT(*) AS count
          FROM student s
          INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
          WHERE s.std_class = 'ป.6' && a.atd_date = '$date' && a.atd_status = 'ข'";
    $stmt = $pdo->query($sql_kad_p6);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $count_kad_p6 = $result['count'];




    // echo $count_kad_p6;

} catch (PDOException $e) {
    echo "การค้นหาข้อมูลผิดพลาด: " . $e->getMessage();
}
