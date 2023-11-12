<div class="main-content">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">

                <div class="card-header card-header-text">
                    <h3 class="card-title">ดูสถิติการมาเรียนย้อนหลัง</h3>

                    <div class="container mt-2">
                        <form action="" method="get">

                            <div class="col-lg-3 col-md-3 col-sm-3 mb-2">
                                <input type="date" class="form-control" id="selectDate" name="selectDate" value="selectDate" required>
                            </div>
                            <div class=""><button type="submit" class="btn btn-outline-secondary">ดูข้อมูล</button></div>

                        </form>
                    </div>

                    <?php

                    $selectDate = $_GET['selectDate'];

                    ?>

                    <h4 class="text-success" style="margin-left: 10px; margin-top:15px;">
                        <?php

                        if ($selectDate != "") {
                            $timestamp = strtotime($selectDate);
                            $new_date = date("d/m/Y", $timestamp);
                            echo "วันที่" . " " . $new_date;
                        } else {
                            echo "เลือกวันที่ที่ต้องการดูข้อมูล";
                        }

                        ?>
                    </h4>

                </div>
            </div>
        </div>
    </div>

    <!-------------- query ----------->

    <?php

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
        $sql_ma = "SELECT COUNT(*) AS count FROM attendance WHERE atd_date = '$selectDate' && atd_status = 'ม'";
        $stmt = $pdo->query($sql_ma);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_ma = $result['count'];

        // นับจำนวนนักเรียนชายที่มาเรียน
        $sql_ma_m = "SELECT COUNT(*) AS count
    FROM student s
    INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
    WHERE s.std_gender = 'ช' && a.atd_date = '$selectDate' && a.atd_status = 'ม'";
        $stmt = $pdo->query($sql_ma_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_ma_m = $result['count'];

        // นับจำนวนนักเรียนหญิงที่มาเรียน
        $sql_ma_m = "SELECT COUNT(*) AS count
     FROM student s
     INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
     WHERE s.std_gender = 'ญ' && a.atd_date = '$selectDate' && a.atd_status = 'ม'";
        $stmt = $pdo->query($sql_ma_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_ma_wm = $result['count'];

        // นับจำนวนนักเรียนที่ลาเรียน
        $sql_la = "SELECT COUNT(*) AS count FROM attendance WHERE atd_date = '$selectDate' && atd_status = 'ล'";
        $stmt = $pdo->query($sql_la);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_la = $result['count'];

        // นับจำนวนนักเรียนชายที่ลาเรียน
        $sql_la_m = "SELECT COUNT(*) AS count
    FROM student s
    INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
    WHERE s.std_gender = 'ช' && a.atd_date = '$selectDate' && a.atd_status = 'ล'";
        $stmt = $pdo->query($sql_la_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_la_m = $result['count'];

        // นับจำนวนนักเรียนหญิงที่ลาเรียน
        $sql_la_m = "SELECT COUNT(*) AS count
     FROM student s
     INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
     WHERE s.std_gender = 'ญ' && a.atd_date = '$selectDate' && a.atd_status = 'ล'";
        $stmt = $pdo->query($sql_la_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_la_wm = $result['count'];

        // นับจำนวนนักเรียนที่ขาดเรียน
        $sql_kad = "SELECT COUNT(*) AS count FROM attendance WHERE atd_date = '$selectDate' && atd_status = 'ข'";
        $stmt = $pdo->query($sql_kad);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_kad = $result['count'];

        // นับจำนวนนักเรียนชายที่ขาดเรียน
        $sql_kad_m = "SELECT COUNT(*) AS count
    FROM student s
    INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
    WHERE s.std_gender = 'ช' && a.atd_date = '$selectDate' && a.atd_status = 'ข'";
        $stmt = $pdo->query($sql_kad_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_kad_m = $result['count'];

        // นับจำนวนนักเรียนหญิงที่ขาดเรียน
        $sql_kad_m = "SELECT COUNT(*) AS count
     FROM student s
     INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
     WHERE s.std_gender = 'ญ' && a.atd_date = '$selectDate' && a.atd_status = 'ข'";
        $stmt = $pdo->query($sql_kad_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_kad_wm = $result['count'];
    } catch (PDOException $e) {
        echo "การค้นหาข้อมูลผิดพลาด: " . $e->getMessage();
    }

    ?>

    <!-------- ปิด query ---------->




    <!---เปิดส่วนของหน้า dasboard ภาพรวมทั้งหมด----->

    <div class="row">


        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header">
                    <div class="icon icon-info">
                        <span class="material-icons">group</span>
                    </div>
                </div>
                <div class="card-content">
                    <p class="category"><strong>นักเรียนทั้งหมด</strong></p>
                    <h3 class="card-title"><?php echo $count_all ?> คน</h3>
                    <h5 class="card-title"><?php echo $_count_all = ($count_all / $count_all) * 100 ?> %</h5>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons ">wc</i>
                        <a>ชาย <?php echo $count_all_m ?> คน หญิง <?php echo $count_all_wm ?> คน</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header">
                    <div class="icon icon-success">
                        <span class="material-icons">group</span>
                    </div>
                </div>
                <div class="card-content">
                    <p class="category"><strong>มาเรียน</strong></p>
                    <h3 class="card-title"><?php echo $count_ma ?> คน</h3>
                    <h5 class="card-title"><?php echo number_format($_count_ma = ($count_ma / $count_all) * 100, 2) ?> %</h5>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons ">wc</i>
                        <a>ชาย <?php echo $count_ma_m ?> คน หญิง <?php echo $count_ma_wm ?> คน</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header">
                    <div class="icon icon-warning">
                        <span class="material-icons">group</span>
                    </div>
                </div>
                <div class="card-content">
                    <p class="category"><strong>ลา</strong></p>
                    <h3 class="card-title"><?php echo $count_la ?> คน</h3>
                    <h5 class="card-title"><?php echo number_format($_count_ma = ($count_la / $count_all) * 100, 2) ?> %</h5>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons ">wc</i>
                        <a>ชาย <?php echo $count_la_m ?> คน หญิง <?php echo $count_la_wm ?> คน</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header">
                    <div class="icon icon-rose">
                        <span class="material-icons">group</span>
                    </div>
                </div>
                <div class="card-content">
                    <p class="category"><strong>ขาดเรียน</strong></p>
                    <h3 class="card-title"><?php echo $count_kad ?> คน</h3>
                    <h5 class="card-title"><?php echo number_format($_count_ma = ($count_kad / $count_all) * 100, 2) ?> %</h5>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons ">wc</i>
                        <a>ชาย <?php echo $count_kad_m ?> คน หญิง <?php echo $count_kad_wm ?> คน</a>
                    </div>
                </div>
            </div>
        </div>



    </div>

    <!---ปิดส่วนของหน้า dasboard ภาพรวมทั้งหมด----->



    <!---เปิดส่วนของหน้า dashboard รายชั้น ----->

    <!---เปิดการ query ----->

    <?php

    try {

        // นับจำนวนนักเรียน อ.2 ที่มาเรียน
        $sql_ma_o2 = "SELECT COUNT(*) AS count
FROM student s
INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
WHERE s.std_class = 'อ.2' && a.atd_date = '$selectDate' && a.atd_status = 'ม'";
        $stmt = $pdo->query($sql_ma_o2);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_ma_o2 = $result['count'];

        // นับจำนวนนักเรียน อ.2 ที่ลาเรียน
        $sql_la_o2 = "SELECT COUNT(*) AS count
 FROM student s
 INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
 WHERE s.std_class = 'อ.2' && a.atd_date = '$selectDate' && a.atd_status = 'ล'";
        $stmt = $pdo->query($sql_la_o2);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_la_o2 = $result['count'];

        // นับจำนวนนักเรียน อ.2 ที่ขาดเรียน
        $sql_kad_o2 = "SELECT COUNT(*) AS count
FROM student s
INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
WHERE s.std_class = 'อ.2' && a.atd_date = '$selectDate' && a.atd_status = 'ข'";
        $stmt = $pdo->query($sql_kad_o2);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_kad_o2 = $result['count'];

        // นับจำนวนนักเรียน อ.3 ที่มาเรียน
        $sql_ma_o3 = "SELECT COUNT(*) AS count
 FROM student s
 INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
 WHERE s.std_class = 'อ.3' && a.atd_date = '$selectDate' && a.atd_status = 'ม'";
        $stmt = $pdo->query($sql_ma_o3);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_ma_o3 = $result['count'];

        // นับจำนวนนักเรียน อ.3 ที่ลาเรียน
        $sql_la_o3 = "SELECT COUNT(*) AS count
  FROM student s
  INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
  WHERE s.std_class = 'อ.3' && a.atd_date = '$selectDate' && a.atd_status = 'ล'";
        $stmt = $pdo->query($sql_la_o3);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_la_o3 = $result['count'];

        // นับจำนวนนักเรียน อ.3 ที่ขาดเรียน
        $sql_kad_o3 = "SELECT COUNT(*) AS count
 FROM student s
 INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
 WHERE s.std_class = 'อ.3' && a.atd_date = '$selectDate' && a.atd_status = 'ข'";
        $stmt = $pdo->query($sql_kad_o3);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_kad_o3 = $result['count'];

        // นับจำนวนนักเรียน ป.1 ที่มาเรียน
        $sql_ma_p1 = "SELECT COUNT(*) AS count
 FROM student s
 INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
 WHERE s.std_class = 'ป.1' && a.atd_date = '$selectDate' && a.atd_status = 'ม'";
        $stmt = $pdo->query($sql_ma_p1);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_ma_p1 = $result['count'];

        // นับจำนวนนักเรียน ป.1 ที่ลาเรียน
        $sql_la_p1 = "SELECT COUNT(*) AS count
  FROM student s
  INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
  WHERE s.std_class = 'ป.1' && a.atd_date = '$selectDate' && a.atd_status = 'ล'";
        $stmt = $pdo->query($sql_la_p1);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_la_p1 = $result['count'];

        // นับจำนวนนักเรียน ป.1 ที่ขาดเรียน
        $sql_kad_p1 = "SELECT COUNT(*) AS count
 FROM student s
 INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
 WHERE s.std_class = 'ป.1' && a.atd_date = '$selectDate' && a.atd_status = 'ข'";
        $stmt = $pdo->query($sql_kad_p1);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_kad_p1 = $result['count'];

        // นับจำนวนนักเรียน ป.2 ที่มาเรียน
        $sql_ma_p2 = "SELECT COUNT(*) AS count
 FROM student s
 INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
 WHERE s.std_class = 'ป.2' && a.atd_date = '$selectDate' && a.atd_status = 'ม'";
        $stmt = $pdo->query($sql_ma_p2);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_ma_p2 = $result['count'];

        // นับจำนวนนักเรียน ป.2 ที่ลาเรียน
        $sql_la_p2 = "SELECT COUNT(*) AS count
  FROM student s
  INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
  WHERE s.std_class = 'ป.2' && a.atd_date = '$selectDate' && a.atd_status = 'ล'";
        $stmt = $pdo->query($sql_la_p2);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_la_p2 = $result['count'];

        // นับจำนวนนักเรียน ป.2 ที่ขาดเรียน
        $sql_kad_p2 = "SELECT COUNT(*) AS count
 FROM student s
 INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
 WHERE s.std_class = 'ป.2' && a.atd_date = '$selectDate' && a.atd_status = 'ข'";
        $stmt = $pdo->query($sql_kad_p2);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_kad_p2 = $result['count'];

        // นับจำนวนนักเรียน ป.3 ที่มาเรียน
        $sql_ma_p3 = "SELECT COUNT(*) AS count
 FROM student s
 INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
 WHERE s.std_class = 'ป.3' && a.atd_date = '$selectDate' && a.atd_status = 'ม'";
        $stmt = $pdo->query($sql_ma_p3);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_ma_p3 = $result['count'];

        // นับจำนวนนักเรียน ป.3 ที่ลาเรียน
        $sql_la_p3 = "SELECT COUNT(*) AS count
  FROM student s
  INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
  WHERE s.std_class = 'ป.3' && a.atd_date = '$selectDate' && a.atd_status = 'ล'";
        $stmt = $pdo->query($sql_la_p3);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_la_p3 = $result['count'];

        // นับจำนวนนักเรียน ป.3 ที่ขาดเรียน
        $sql_kad_p3 = "SELECT COUNT(*) AS count
 FROM student s
 INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
 WHERE s.std_class = 'ป.3' && a.atd_date = '$selectDate' && a.atd_status = 'ข'";
        $stmt = $pdo->query($sql_kad_p3);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_kad_p3 = $result['count'];

        // นับจำนวนนักเรียน ป.4 ที่มาเรียน
        $sql_ma_p4 = "SELECT COUNT(*) AS count
 FROM student s
 INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
 WHERE s.std_class = 'ป.4' && a.atd_date = '$selectDate' && a.atd_status = 'ม'";
        $stmt = $pdo->query($sql_ma_p4);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_ma_p4 = $result['count'];

        // นับจำนวนนักเรียน ป.4 ที่ลาเรียน
        $sql_la_p4 = "SELECT COUNT(*) AS count
  FROM student s
  INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
  WHERE s.std_class = 'ป.4' && a.atd_date = '$selectDate' && a.atd_status = 'ล'";
        $stmt = $pdo->query($sql_la_p4);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_la_p4 = $result['count'];

        // นับจำนวนนักเรียน ป.4 ที่ขาดเรียน
        $sql_kad_p4 = "SELECT COUNT(*) AS count
 FROM student s
 INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
 WHERE s.std_class = 'ป.4' && a.atd_date = '$selectDate' && a.atd_status = 'ข'";
        $stmt = $pdo->query($sql_kad_p4);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_kad_p4 = $result['count'];

        // นับจำนวนนักเรียน ป.5 ที่มาเรียน
        $sql_ma_p5 = "SELECT COUNT(*) AS count
      FROM student s
      INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
      WHERE s.std_class = 'ป.5' && a.atd_date = '$selectDate' && a.atd_status = 'ม'";
        $stmt = $pdo->query($sql_ma_p5);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_ma_p5 = $result['count'];

        // นับจำนวนนักเรียน ป.5 ที่ลาเรียน
        $sql_la_p5 = "SELECT COUNT(*) AS count
       FROM student s
       INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
       WHERE s.std_class = 'ป.5' && a.atd_date = '$selectDate' && a.atd_status = 'ล'";
        $stmt = $pdo->query($sql_la_p5);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_la_p5 = $result['count'];

        // นับจำนวนนักเรียน ป.5 ที่ขาดเรียน
        $sql_kad_p5 = "SELECT COUNT(*) AS count
      FROM student s
      INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
      WHERE s.std_class = 'ป.5' && a.atd_date = '$selectDate' && a.atd_status = 'ข'";
        $stmt = $pdo->query($sql_kad_p5);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_kad_p5 = $result['count'];

        // นับจำนวนนักเรียน ป.6 ที่มาเรียน
        $sql_ma_p6 = "SELECT COUNT(*) AS count
      FROM student s
      INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
      WHERE s.std_class = 'ป.6' && a.atd_date = '$selectDate' && a.atd_status = 'ม'";
        $stmt = $pdo->query($sql_ma_p6);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_ma_p6 = $result['count'];

        // นับจำนวนนักเรียน ป.6 ที่ลาเรียน
        $sql_la_p6 = "SELECT COUNT(*) AS count
       FROM student s
       INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
       WHERE s.std_class = 'ป.6' && a.atd_date = '$selectDate' && a.atd_status = 'ล'";
        $stmt = $pdo->query($sql_la_p6);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_la_p6 = $result['count'];

        // นับจำนวนนักเรียน ป.6 ที่ขาดเรียน
        $sql_kad_p6 = "SELECT COUNT(*) AS count
      FROM student s
      INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
      WHERE s.std_class = 'ป.6' && a.atd_date = '$selectDate' && a.atd_status = 'ข'";
        $stmt = $pdo->query($sql_kad_p6);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_kad_p6 = $result['count'];
    } catch (PDOException $e) {
        echo "การค้นหาข้อมูลผิดพลาด: " . $e->getMessage();
    }


    ?>

    <!---ปิดการ query ----->

    <!-------------- query ----------->

    <?php

    try {

        //////////////////////////////////////////////////////////////////////////////////////////////////////

        /// แยกชายหญิง ///

        //////////////////////////////////////////////////////////////////////////////////////////////////////

        // นับจำนวนนักเรียนชายที่มาเรียน อ.2
        $sql_ma_m = "SELECT COUNT(*) AS count
FROM student s
INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
WHERE s.std_gender = 'ช' && a.atd_date = '$selectDate' && a.atd_status = 'ม' && s.std_class = 'อ.2'";
        $stmt = $pdo->query($sql_ma_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_ma_m_o2 = $result['count'];

        // นับจำนวนนักเรียนหญิงที่มาเรียน อ.2
        $sql_ma_m = "SELECT COUNT(*) AS count
 FROM student s
 INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
 WHERE s.std_gender = 'ญ' && a.atd_date = '$selectDate' && a.atd_status = 'ม' && s.std_class = 'อ.2'";
        $stmt = $pdo->query($sql_ma_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_ma_wm_o2 = $result['count'];



        // นับจำนวนนักเรียนชายที่ลาเรียน อ.2
        $sql_la_m = "SELECT COUNT(*) AS count
FROM student s
INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
WHERE s.std_gender = 'ช' && a.atd_date = '$selectDate' && a.atd_status = 'ล' && s.std_class = 'อ.2'";
        $stmt = $pdo->query($sql_la_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_la_m_o2 = $result['count'];

        // นับจำนวนนักเรียนหญิงที่ลาเรียน อ.2
        $sql_la_m = "SELECT COUNT(*) AS count
 FROM student s
 INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
 WHERE s.std_gender = 'ญ' && a.atd_date = '$selectDate' && a.atd_status = 'ล' && s.std_class = 'อ.2'";
        $stmt = $pdo->query($sql_la_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_la_wm_o2 = $result['count'];


        // นับจำนวนนักเรียนชายที่ขาดเรียน อ.2
        $sql_kad_m = "SELECT COUNT(*) AS count
FROM student s
INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
WHERE s.std_gender = 'ช' && a.atd_date = '$selectDate' && a.atd_status = 'ข' && s.std_class = 'อ.2'";
        $stmt = $pdo->query($sql_kad_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_kad_m_o2 = $result['count'];

        // นับจำนวนนักเรียนหญิงที่ขาดเรียน อ.2
        $sql_kad_m = "SELECT COUNT(*) AS count
 FROM student s
 INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
 WHERE s.std_gender = 'ญ' && a.atd_date = '$selectDate' && a.atd_status = 'ข' && s.std_class = 'อ.2'";
        $stmt = $pdo->query($sql_kad_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_kad_wm_o2 = $result['count'];



        // นับจำนวนนักเรียนชายที่มาเรียน อ.3
        $sql_ma_m = "SELECT COUNT(*) AS count
FROM student s
INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
WHERE s.std_gender = 'ช' && a.atd_date = '$selectDate' && a.atd_status = 'ม' && s.std_class = 'อ.3'";
        $stmt = $pdo->query($sql_ma_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_ma_m_o3 = $result['count'];

        // นับจำนวนนักเรียนหญิงที่มาเรียน อ.3
        $sql_ma_m = "SELECT COUNT(*) AS count
 FROM student s
 INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
 WHERE s.std_gender = 'ญ' && a.atd_date = '$selectDate' && a.atd_status = 'ม' && s.std_class = 'อ.3'";
        $stmt = $pdo->query($sql_ma_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_ma_wm_o3 = $result['count'];



        // นับจำนวนนักเรียนชายที่ลาเรียน อ.3
        $sql_la_m = "SELECT COUNT(*) AS count
FROM student s
INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
WHERE s.std_gender = 'ช' && a.atd_date = '$selectDate' && a.atd_status = 'ล' && s.std_class = 'อ.3'";
        $stmt = $pdo->query($sql_la_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_la_m_o3 = $result['count'];

        // นับจำนวนนักเรียนหญิงที่ลาเรียน อ.3
        $sql_la_m = "SELECT COUNT(*) AS count
 FROM student s
 INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
 WHERE s.std_gender = 'ญ' && a.atd_date = '$selectDate' && a.atd_status = 'ล' && s.std_class = 'อ.3'";
        $stmt = $pdo->query($sql_la_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_la_wm_o3 = $result['count'];


        // นับจำนวนนักเรียนชายที่ขาดเรียน อ.3
        $sql_kad_m = "SELECT COUNT(*) AS count
FROM student s
INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
WHERE s.std_gender = 'ช' && a.atd_date = '$selectDate' && a.atd_status = 'ข' && s.std_class = 'อ.3'";
        $stmt = $pdo->query($sql_kad_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_kad_m_o3 = $result['count'];

        // นับจำนวนนักเรียนหญิงที่ขาดเรียน อ.3
        $sql_kad_m = "SELECT COUNT(*) AS count
 FROM student s
 INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
 WHERE s.std_gender = 'ญ' && a.atd_date = '$selectDate' && a.atd_status = 'ข' && s.std_class = 'อ.3'";
        $stmt = $pdo->query($sql_kad_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_kad_wm_o3 = $result['count'];


        // นับจำนวนนักเรียนชายที่มาเรียน ป.1
        $sql_ma_m = "SELECT COUNT(*) AS count
      FROM student s
      INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
      WHERE s.std_gender = 'ช' && a.atd_date = '$selectDate' && a.atd_status = 'ม' && s.std_class = 'ป.1'";
        $stmt = $pdo->query($sql_ma_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_ma_m_p1 = $result['count'];

        // นับจำนวนนักเรียนหญิงที่มาเรียน ป.1
        $sql_ma_m = "SELECT COUNT(*) AS count
       FROM student s
       INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
       WHERE s.std_gender = 'ญ' && a.atd_date = '$selectDate' && a.atd_status = 'ม' && s.std_class = 'ป.1'";
        $stmt = $pdo->query($sql_ma_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_ma_wm_p1 = $result['count'];



        // นับจำนวนนักเรียนชายที่ลาเรียน ป.1
        $sql_la_m = "SELECT COUNT(*) AS count
      FROM student s
      INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
      WHERE s.std_gender = 'ช' && a.atd_date = '$selectDate' && a.atd_status = 'ล' && s.std_class = 'ป.1'";
        $stmt = $pdo->query($sql_la_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_la_m_p1 = $result['count'];

        // นับจำนวนนักเรียนหญิงที่ลาเรียน ป.1
        $sql_la_m = "SELECT COUNT(*) AS count
       FROM student s
       INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
       WHERE s.std_gender = 'ญ' && a.atd_date = '$selectDate' && a.atd_status = 'ล' && s.std_class = 'ป.1'";
        $stmt = $pdo->query($sql_la_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_la_wm_p1 = $result['count'];


        // นับจำนวนนักเรียนชายที่ขาดเรียน ป.1
        $sql_kad_m = "SELECT COUNT(*) AS count
      FROM student s
      INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
      WHERE s.std_gender = 'ช' && a.atd_date = '$selectDate' && a.atd_status = 'ข' && s.std_class = 'ป.1'";
        $stmt = $pdo->query($sql_kad_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_kad_m_p1 = $result['count'];

        // นับจำนวนนักเรียนหญิงที่ขาดเรียน ป.1
        $sql_kad_m = "SELECT COUNT(*) AS count
       FROM student s
       INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
       WHERE s.std_gender = 'ญ' && a.atd_date = '$selectDate' && a.atd_status = 'ข' && s.std_class = 'ป.1'";
        $stmt = $pdo->query($sql_kad_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_kad_wm_p1 = $result['count'];

        // นับจำนวนนักเรียนชายที่มาเรียน ป.2
        $sql_ma_m = "SELECT COUNT(*) AS count
      FROM student s
      INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
      WHERE s.std_gender = 'ช' && a.atd_date = '$selectDate' && a.atd_status = 'ม' && s.std_class = 'ป.2'";
        $stmt = $pdo->query($sql_ma_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_ma_m_p2 = $result['count'];

        // นับจำนวนนักเรียนหญิงที่มาเรียน ป.2
        $sql_ma_m = "SELECT COUNT(*) AS count
       FROM student s
       INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
       WHERE s.std_gender = 'ญ' && a.atd_date = '$selectDate' && a.atd_status = 'ม' && s.std_class = 'ป.2'";
        $stmt = $pdo->query($sql_ma_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_ma_wm_p2 = $result['count'];



        // นับจำนวนนักเรียนชายที่ลาเรียน ป.2
        $sql_la_m = "SELECT COUNT(*) AS count
      FROM student s
      INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
      WHERE s.std_gender = 'ช' && a.atd_date = '$selectDate' && a.atd_status = 'ล' && s.std_class = 'ป.2'";
        $stmt = $pdo->query($sql_la_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_la_m_p2 = $result['count'];

        // นับจำนวนนักเรียนหญิงที่ลาเรียน ป.2
        $sql_la_m = "SELECT COUNT(*) AS count
       FROM student s
       INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
       WHERE s.std_gender = 'ญ' && a.atd_date = '$selectDate' && a.atd_status = 'ล' && s.std_class = 'ป.2'";
        $stmt = $pdo->query($sql_la_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_la_wm_p2 = $result['count'];


        // นับจำนวนนักเรียนชายที่ขาดเรียน ป.2
        $sql_kad_m = "SELECT COUNT(*) AS count
      FROM student s
      INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
      WHERE s.std_gender = 'ช' && a.atd_date = '$selectDate' && a.atd_status = 'ข' && s.std_class = 'ป.2'";
        $stmt = $pdo->query($sql_kad_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_kad_m_p2 = $result['count'];

        // นับจำนวนนักเรียนหญิงที่ขาดเรียน ป.2
        $sql_kad_m = "SELECT COUNT(*) AS count
       FROM student s
       INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
       WHERE s.std_gender = 'ญ' && a.atd_date = '$selectDate' && a.atd_status = 'ข' && s.std_class = 'ป.2'";
        $stmt = $pdo->query($sql_kad_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_kad_wm_p2 = $result['count'];


        // นับจำนวนนักเรียนชายที่มาเรียน ป.3
        $sql_ma_m = "SELECT COUNT(*) AS count
FROM student s
INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
WHERE s.std_gender = 'ช' && a.atd_date = '$selectDate' && a.atd_status = 'ม' && s.std_class = 'ป.3'";
        $stmt = $pdo->query($sql_ma_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_ma_m_p3 = $result['count'];

        // นับจำนวนนักเรียนหญิงที่มาเรียน ป.3
        $sql_ma_m = "SELECT COUNT(*) AS count
 FROM student s
 INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
 WHERE s.std_gender = 'ญ' && a.atd_date = '$selectDate' && a.atd_status = 'ม' && s.std_class = 'ป.3'";
        $stmt = $pdo->query($sql_ma_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_ma_wm_p3 = $result['count'];



        // นับจำนวนนักเรียนชายที่ลาเรียน ป.3
        $sql_la_m = "SELECT COUNT(*) AS count
FROM student s
INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
WHERE s.std_gender = 'ช' && a.atd_date = '$selectDate' && a.atd_status = 'ล' && s.std_class = 'ป.3'";
        $stmt = $pdo->query($sql_la_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_la_m_p3 = $result['count'];

        // นับจำนวนนักเรียนหญิงที่ลาเรียน ป.3
        $sql_la_m = "SELECT COUNT(*) AS count
 FROM student s
 INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
 WHERE s.std_gender = 'ญ' && a.atd_date = '$selectDate' && a.atd_status = 'ล' && s.std_class = 'ป.3'";
        $stmt = $pdo->query($sql_la_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_la_wm_p3 = $result['count'];


        // นับจำนวนนักเรียนชายที่ขาดเรียน ป.3
        $sql_kad_m = "SELECT COUNT(*) AS count
FROM student s
INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
WHERE s.std_gender = 'ช' && a.atd_date = '$selectDate' && a.atd_status = 'ข' && s.std_class = 'ป.3'";
        $stmt = $pdo->query($sql_kad_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_kad_m_p3 = $result['count'];

        // นับจำนวนนักเรียนหญิงที่ขาดเรียน ป.3
        $sql_kad_m = "SELECT COUNT(*) AS count
 FROM student s
 INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
 WHERE s.std_gender = 'ญ' && a.atd_date = '$selectDate' && a.atd_status = 'ข' && s.std_class = 'ป.3'";
        $stmt = $pdo->query($sql_kad_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_kad_wm_p3 = $result['count'];



        // นับจำนวนนักเรียนชายที่มาเรียน ป.4
        $sql_ma_m = "SELECT COUNT(*) AS count
    FROM student s
    INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
    WHERE s.std_gender = 'ช' && a.atd_date = '$selectDate' && a.atd_status = 'ม' && s.std_class = 'ป.4'";
        $stmt = $pdo->query($sql_ma_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_ma_m_p4 = $result['count'];

        // นับจำนวนนักเรียนหญิงที่มาเรียน ป.4
        $sql_ma_m = "SELECT COUNT(*) AS count
     FROM student s
     INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
     WHERE s.std_gender = 'ญ' && a.atd_date = '$selectDate' && a.atd_status = 'ม' && s.std_class = 'ป.4'";
        $stmt = $pdo->query($sql_ma_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_ma_wm_p4 = $result['count'];



        // นับจำนวนนักเรียนชายที่ลาเรียน ป.4
        $sql_la_m = "SELECT COUNT(*) AS count
    FROM student s
    INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
    WHERE s.std_gender = 'ช' && a.atd_date = '$selectDate' && a.atd_status = 'ล' && s.std_class = 'ป.4'";
        $stmt = $pdo->query($sql_la_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_la_m_p4 = $result['count'];

        // นับจำนวนนักเรียนหญิงที่ลาเรียน ป.4
        $sql_la_m = "SELECT COUNT(*) AS count
     FROM student s
     INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
     WHERE s.std_gender = 'ญ' && a.atd_date = '$selectDate' && a.atd_status = 'ล' && s.std_class = 'ป.4'";
        $stmt = $pdo->query($sql_la_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_la_wm_p4 = $result['count'];


        // นับจำนวนนักเรียนชายที่ขาดเรียน ป.4
        $sql_kad_m = "SELECT COUNT(*) AS count
    FROM student s
    INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
    WHERE s.std_gender = 'ช' && a.atd_date = '$selectDate' && a.atd_status = 'ข' && s.std_class = 'ป.4'";
        $stmt = $pdo->query($sql_kad_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_kad_m_p4 = $result['count'];

        // นับจำนวนนักเรียนหญิงที่ขาดเรียน ป.4
        $sql_kad_m = "SELECT COUNT(*) AS count
     FROM student s
     INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
     WHERE s.std_gender = 'ญ' && a.atd_date = '$selectDate' && a.atd_status = 'ข' && s.std_class = 'ป.4'";
        $stmt = $pdo->query($sql_kad_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_kad_wm_p4 = $result['count'];


        // นับจำนวนนักเรียนชายที่มาเรียน ป.5
        $sql_ma_m = "SELECT COUNT(*) AS count
      FROM student s
      INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
      WHERE s.std_gender = 'ช' && a.atd_date = '$selectDate' && a.atd_status = 'ม' && s.std_class = 'ป.5'";
        $stmt = $pdo->query($sql_ma_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_ma_m_p5 = $result['count'];

        // นับจำนวนนักเรียนหญิงที่มาเรียน ป.5
        $sql_ma_m = "SELECT COUNT(*) AS count
       FROM student s
       INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
       WHERE s.std_gender = 'ญ' && a.atd_date = '$selectDate' && a.atd_status = 'ม' && s.std_class = 'ป.5'";
        $stmt = $pdo->query($sql_ma_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_ma_wm_p5 = $result['count'];



        // นับจำนวนนักเรียนชายที่ลาเรียน ป.5
        $sql_la_m = "SELECT COUNT(*) AS count
      FROM student s
      INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
      WHERE s.std_gender = 'ช' && a.atd_date = '$selectDate' && a.atd_status = 'ล' && s.std_class = 'ป.5'";
        $stmt = $pdo->query($sql_la_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_la_m_p5 = $result['count'];

        // นับจำนวนนักเรียนหญิงที่ลาเรียน ป.5
        $sql_la_m = "SELECT COUNT(*) AS count
       FROM student s
       INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
       WHERE s.std_gender = 'ญ' && a.atd_date = '$selectDate' && a.atd_status = 'ล' && s.std_class = 'ป.5'";
        $stmt = $pdo->query($sql_la_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_la_wm_p5 = $result['count'];


        // นับจำนวนนักเรียนชายที่ขาดเรียน ป.5
        $sql_kad_m = "SELECT COUNT(*) AS count
      FROM student s
      INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
      WHERE s.std_gender = 'ช' && a.atd_date = '$selectDate' && a.atd_status = 'ข' && s.std_class = 'ป.5'";
        $stmt = $pdo->query($sql_kad_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_kad_m_p5 = $result['count'];

        // นับจำนวนนักเรียนหญิงที่ขาดเรียน ป.5
        $sql_kad_m = "SELECT COUNT(*) AS count
       FROM student s
       INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
       WHERE s.std_gender = 'ญ' && a.atd_date = '$selectDate' && a.atd_status = 'ข' && s.std_class = 'ป.5'";
        $stmt = $pdo->query($sql_kad_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_kad_wm_p5 = $result['count'];


        // นับจำนวนนักเรียนชายที่มาเรียน ป.6
        $sql_ma_m = "SELECT COUNT(*) AS count
      FROM student s
      INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
      WHERE s.std_gender = 'ช' && a.atd_date = '$selectDate' && a.atd_status = 'ม' && s.std_class = 'ป.6'";
        $stmt = $pdo->query($sql_ma_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_ma_m_p6 = $result['count'];

        // นับจำนวนนักเรียนหญิงที่มาเรียน ป.6
        $sql_ma_m = "SELECT COUNT(*) AS count
       FROM student s
       INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
       WHERE s.std_gender = 'ญ' && a.atd_date = '$selectDate' && a.atd_status = 'ม' && s.std_class = 'ป.6'";
        $stmt = $pdo->query($sql_ma_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_ma_wm_p6 = $result['count'];



        // นับจำนวนนักเรียนชายที่ลาเรียน ป.6
        $sql_la_m = "SELECT COUNT(*) AS count
      FROM student s
      INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
      WHERE s.std_gender = 'ช' && a.atd_date = '$selectDate' && a.atd_status = 'ล' && s.std_class = 'ป.6'";
        $stmt = $pdo->query($sql_la_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_la_m_p6 = $result['count'];

        // นับจำนวนนักเรียนหญิงที่ลาเรียน ป.6
        $sql_la_m = "SELECT COUNT(*) AS count
       FROM student s
       INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
       WHERE s.std_gender = 'ญ' && a.atd_date = '$selectDate' && a.atd_status = 'ล' && s.std_class = 'ป.6'";
        $stmt = $pdo->query($sql_la_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_la_wm_p6 = $result['count'];


        // นับจำนวนนักเรียนชายที่ขาดเรียน ป.6
        $sql_kad_m = "SELECT COUNT(*) AS count
      FROM student s
      INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
      WHERE s.std_gender = 'ช' && a.atd_date = '$selectDate' && a.atd_status = 'ข' && s.std_class = 'ป.6'";
        $stmt = $pdo->query($sql_kad_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_kad_m_p6 = $result['count'];

        // นับจำนวนนักเรียนหญิงที่ขาดเรียน ป.6
        $sql_kad_m = "SELECT COUNT(*) AS count
       FROM student s
       INNER JOIN attendance a ON s.std_stdid = a.atd_stdid
       WHERE s.std_gender = 'ญ' && a.atd_date = '$selectDate' && a.atd_status = 'ข' && s.std_class = 'ป.6'";
        $stmt = $pdo->query($sql_kad_m);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count_kad_wm_p6 = $result['count'];
    } catch (PDOException $e) {
        echo "การค้นหาข้อมูลผิดพลาด: " . $e->getMessage();
    }

    ?>

    <!-------- ปิด query ---------->





    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-body">
                <h4>สถิติการมาเรียนรายชั้น</h4>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="fw-bold">ชั้น</th>
                            <th class="fw-bold">มา</th>
                            <th class="fw-bold">ลา</th>
                            <th class="fw-bold">ขาด</th>
                            <th class="fw-bold">รวม</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>อนุบาล 2<p class="text-info" style="margin-top: -5px;">ชาย/หญิง</p>
                            </td>
                            <td><?php echo $count_ma_o2 ?><p class="text-info" style="margin-top: -5px;"><?php echo $count_ma_m_o2?>/<?php echo $count_ma_wm_o2?></p></td>
                            <td><?php echo $count_la_o2 ?><p class="text-info" style="margin-top: -5px;"><?php echo $count_la_m_o2?>/<?php echo $count_la_wm_o2?></p></td>
                            <td><?php echo $count_kad_o2 ?><p class="text-info" style="margin-top: -5px;"><?php echo $count_kad_m_o2?>/<?php echo $count_kad_wm_o2?></p></td>
                            <td><?php echo $_count_ma_o2 = $count_ma_o2 + $count_la_o2 + $count_kad_o2?><p class="text-info" style="margin-top: -5px;"><?php echo $_count_all_m_o2 = $count_ma_m_o2 + $count_la_m_o2 + $count_kad_m_o2 ?>/<?php echo $_count_all_wm_o2 = $count_ma_wm_o2 + $count_la_wm_o2 + $count_kad_wm_o2 ?></p></td>
                        </tr>
                        <tr>
                            <td>อนุบาล 3<p class="text-info" style="margin-top: -5px;">ชาย/หญิง</p>
                            </td>
                            <td><?php echo $count_ma_o3 ?><p class="text-info" style="margin-top: -5px;"><?php echo $count_ma_m_o3?>/<?php echo $count_ma_wm_o3?></p></td>
                            <td><?php echo $count_la_o3 ?><p class="text-info" style="margin-top: -5px;"><?php echo $count_la_m_o3?>/<?php echo $count_la_wm_o3?></p></td>
                            <td><?php echo $count_kad_o3 ?><p class="text-info" style="margin-top: -5px;"><?php echo $count_kad_m_o3?>/<?php echo $count_kad_wm_o3?></p></td>
                            <td><?php echo $_count_ma_o3 = $count_ma_o3 + $count_la_o3 + $count_kad_o3 ?><p class="text-info" style="margin-top: -5px;"><?php echo $_count_all_m_o3 = $count_ma_m_o3 + $count_la_m_o3 + $count_kad_m_o3 ?>/<?php echo $_count_all_wm_o3 = $count_ma_wm_o3 + $count_la_wm_o3 + $count_kad_wm_o3 ?></p></td>
                        </tr>
                        <tr>
                            <td>ประถมศึกษาปีที่ 1<p class="text-info" style="margin-top: -5px;">ชาย/หญิง</p>
                            </td>
                            <td><?php echo $count_ma_p1 ?><p class="text-info" style="margin-top: -5px;"><?php echo $count_ma_m_p1?>/<?php echo $count_ma_wm_p1?></p></td>
                            <td><?php echo $count_la_p1 ?><p class="text-info" style="margin-top: -5px;"><?php echo $count_la_m_p1?>/<?php echo $count_la_wm_p1?></p></td>
                            <td><?php echo $count_kad_p1 ?><p class="text-info" style="margin-top: -5px;"><?php echo $count_kad_m_p1?>/<?php echo $count_kad_wm_p1?></p></td>
                            <td><?php echo $_count_ma_p1 = $count_ma_p1 + $count_la_p1 + $count_kad_p1 ?><p class="text-info" style="margin-top: -5px;"><?php echo $_count_all_m_p1 = $count_ma_m_p1 + $count_la_m_p1 + $count_kad_m_p1 ?>/<?php echo $_count_all_wm_p1 = $count_ma_wm_p1 + $count_la_wm_p1 + $count_kad_wm_p1 ?></p></td>
                        </tr>
                        <tr>
                            <td>ประถมศึกษาปีที่ 2<p class="text-info" style="margin-top: -5px;">ชาย/หญิง</p>
                            </td>
                            <td><?php echo $count_ma_p2 ?><p class="text-info" style="margin-top: -5px;"><?php echo $count_ma_m_p2?>/<?php echo $count_ma_wm_p2?></p></td>
                            <td><?php echo $count_la_p2 ?><p class="text-info" style="margin-top: -5px;"><?php echo $count_la_m_p2?>/<?php echo $count_la_wm_p2?></p></td>
                            <td><?php echo $count_kad_p2 ?><p class="text-info" style="margin-top: -5px;"><?php echo $count_kad_m_p2?>/<?php echo $count_kad_wm_p2?></p></td>
                            <td><?php echo $_count_ma_p2 = $count_ma_p2 + $count_la_p2 + $count_kad_p2 ?><p class="text-info" style="margin-top: -5px;"><?php echo $_count_all_m_p2 = $count_ma_m_p2 + $count_la_m_p2 + $count_kad_m_p2 ?>/<?php echo $_count_all_wm_p2 = $count_ma_wm_p2 + $count_la_wm_p2 + $count_kad_wm_p2 ?></p></td>
                        </tr>
                        <tr>
                            <td>ประถมศึกษาปีที่ 3<p class="text-info" style="margin-top: -5px;">ชาย/หญิง</p>
                            </td>
                            <td><?php echo $count_ma_p3 ?><p class="text-info" style="margin-top: -5px;"><?php echo $count_ma_m_p3?>/<?php echo $count_ma_wm_p3?></p></td>
                            <td><?php echo $count_la_p3 ?><p class="text-info" style="margin-top: -5px;"><?php echo $count_la_m_p3?>/<?php echo $count_la_wm_p3?></p></td>
                            <td><?php echo $count_kad_p3 ?><p class="text-info" style="margin-top: -5px;"><?php echo $count_kad_m_p3?>/<?php echo $count_kad_wm_p3?></p></td>
                            <td><?php echo $_count_ma_p3 = $count_ma_p3 + $count_la_p3 + $count_kad_p3 ?><p class="text-info" style="margin-top: -5px;"><?php echo $_count_all_m_p3 = $count_ma_m_p3 + $count_la_m_p3 + $count_kad_m_p3 ?>/<?php echo $_count_all_wm_p3 = $count_ma_wm_p3 + $count_la_wm_p3 + $count_kad_wm_p3 ?></p></td>
                        </tr>
                        <tr>
                            <td>ประถมศึกษาปีที่ 4<p class="text-info" style="margin-top: -5px;">ชาย/หญิง</p>
                            </td>
                            <td><?php echo $count_ma_p4 ?><p class="text-info" style="margin-top: -5px;"><?php echo $count_ma_m_p4?>/<?php echo $count_ma_wm_p4?></p></td>
                            <td><?php echo $count_la_p4 ?><p class="text-info" style="margin-top: -5px;"><?php echo $count_la_m_p4?>/<?php echo $count_la_wm_p4?></p></td>
                            <td><?php echo $count_kad_p4 ?><p class="text-info" style="margin-top: -5px;"><?php echo $count_kad_m_p4?>/<?php echo $count_kad_wm_p4?></p></td>
                            <td><?php echo $_count_ma_p4 = $count_ma_p4 + $count_la_p4 + $count_kad_p4 ?><p class="text-info" style="margin-top: -5px;"><?php echo $_count_all_m_p4 = $count_ma_m_p4 + $count_la_m_p4 + $count_kad_m_p4 ?>/<?php echo $_count_all_wm_p4 = $count_ma_wm_p4 + $count_la_wm_p4 + $count_kad_wm_p4 ?></p></td>
                        </tr>
                        <tr>
                            <td>ประถมศึกษาปีที่ 5<p class="text-info" style="margin-top: -5px;">ชาย/หญิง</p>
                            </td>
                            <td><?php echo $count_ma_p5 ?><p class="text-info" style="margin-top: -5px;"><?php echo $count_ma_m_p5?>/<?php echo $count_ma_wm_p5?></p></td>
                            <td><?php echo $count_la_p5 ?><p class="text-info" style="margin-top: -5px;"><?php echo $count_la_m_p5?>/<?php echo $count_la_wm_p5?></p></td>
                            <td><?php echo $count_kad_p5 ?><p class="text-info" style="margin-top: -5px;"><?php echo $count_kad_m_p5?>/<?php echo $count_kad_wm_p5?></p></td>
                            <td><?php echo $_count_ma_p5 = $count_ma_p5 + $count_la_p5 + $count_kad_p5 ?><p class="text-info" style="margin-top: -5px;"><?php echo $_count_all_m_p5 = $count_ma_m_p5 + $count_la_m_p5 + $count_kad_m_p5 ?>/<?php echo $_count_all_wm_p5 = $count_ma_wm_p5 + $count_la_wm_p5 + $count_kad_wm_p5 ?></p></td>
                        </tr>
                        <tr>
                            <td>ประถมศึกษาปีที่ 6<p class="text-info" style="margin-top: -5px;">ชาย/หญิง</p>
                            </td>
                            <td><?php echo $count_ma_p6 ?><p class="text-info" style="margin-top: -5px;"><?php echo $count_ma_m_p6?>/<?php echo $count_ma_wm_p6?></p></td>
                            <td><?php echo $count_la_p6 ?><p class="text-info" style="margin-top: -5px;"><?php echo $count_la_m_p6?>/<?php echo $count_la_wm_p6?></p></td>
                            <td><?php echo $count_kad_p6 ?><p class="text-info" style="margin-top: -5px;"><?php echo $count_kad_m_p6?>/<?php echo $count_kad_wm_p6?></p></td>
                            <td><?php echo $_count_ma_p6 = $count_ma_p6 + $count_la_p6 + $count_kad_p6 ?><p class="text-info" style="margin-top: -5px;"><?php echo $_count_all_m_p6 = $count_ma_m_p6 + $count_la_m_p6 + $count_kad_m_p6 ?>/<?php echo $_count_all_wm_p6 = $count_ma_wm_p6 + $count_la_wm_p6 + $count_kad_wm_p6 ?></p></td>
                        </tr>
                        <tr>
                            <td>รวม<p class="text-info" style="margin-top: -5px;">ชาย/หญิง</p>
                            </td>
                            <td><?php echo $count_ma ?><p class="text-info" style="margin-top: -5px;"><?php echo $count_ma_m?>/<?php echo $count_ma_wm?></p></td>
                            <td><?php echo $count_la ?><p class="text-info" style="margin-top: -5px;"><?php echo $count_la_m?>/<?php echo $count_la_wm?></p></td>
                            <td><?php echo $count_kad ?><p class="text-info" style="margin-top: -5px;"><?php echo $count_kad_m?>/<?php echo $count_kad_wm?></p></td>
                            <td><?php echo $count_all ?><p class="text-info" style="margin-top: -5px;"><?php echo $count_all_m?>/<?php echo $count_all_wm?></p></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>


    <!---ปิดส่วนของหน้า dashboard รายชั้น----->




</div>