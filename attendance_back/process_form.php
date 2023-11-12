<!--- import sweetalert2--->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<?php
// กำหนดการเชื่อมต่อกับฐานข้อมูล phpMyAdmin
include_once('../config/data.php');

try {

    // ตรวจสอบว่ามีการส่งข้อมูลจากฟอร์มหรือไม่
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // วนลูปบันทึกข้อมูลการมาเรียนของนักเรียนที่ส่งมาจากฟอร์ม
        foreach ($_POST as $key => $value) {
            // ตรวจสอบชื่อฟิลด์ที่ขึ้นต้นด้วย "student_" เพื่อบันทึกข้อมูลเฉพาะของนักเรียน
            if (strpos($key, 'student_') === 0) {

                // print_r($key);

                // แยก id ของนักเรียนจากชื่อฟิลด์
                $atd_stdid = substr($key, 8, -13);

                // แยก วันที่ จากชื่อฟิลด์
                $atd_date = substr($key, 18);
                //echo $c_date;

                // รับค่าสถานะของนักเรียน
                $atd_status = $_POST[$key];

                // ตรวจสอบว่ามีข้อมูลที่มีอยู่แล้วหรือไม่
                $sqlCheckExist = "SELECT COUNT(*) as count FROM attendance WHERE atd_stdid = :atd_stdid && atd_date = :atd_date ";
                $stmtCheckExist = $pdo->prepare($sqlCheckExist);
                $stmtCheckExist->bindParam(':atd_stdid', $atd_stdid);
                $stmtCheckExist->bindParam(':atd_date', $atd_date);
                $stmtCheckExist->execute();

                $result = $stmtCheckExist->fetch(PDO::FETCH_ASSOC);
                $count = $result['count'];

                if ($count > 0) {
                    // มีข้อมูลการเช็คชื่อในฐานข้อมูลแล้ว
                    echo "_";
                    echo "
                   <script>
           
           Swal.fire({
               title: 'ผิดพลาด',
               text: 'มีข้อมูลการเช็คชื่อในฐานข้อมูลแล้ว',
               icon: 'error',
               showCancelButton: false,
               confirmButtonColor: '#3085d6',
               confirmButtonText: 'ยืนยัน'
           }).then((result1) => {
               
               if (result1.isConfirmed) {
                   window.location.href = '.././'; 
               }
           });
       </script>";
                    exit();
                } else {

                    // เตรียมและส่งคำสั่ง SQL สำหรับการเพิ่มข้อมูลลงในตาราง
                    $stmt = $pdo->prepare("INSERT INTO attendance (atd_stdid, atd_date, atd_status) VALUES (:atd_stdid, :atd_date, :atd_status)");
                    $stmt->bindParam(':atd_stdid', $atd_stdid);
                    $stmt->bindParam(':atd_date', $atd_date);
                    $stmt->bindParam(':atd_status', $atd_status);

                    // ประมวลผลคำสั่ง SQL
                    $stmt->execute();
                }
            }
        }

        // บันทึกข้อมูลการมาเรียนสำเร็จแล้ว
        echo "_";
        echo "
             <script>
             
             Swal.fire({
                 title: 'สำเร็จ',
                 text: 'บันทึกการเช็คชื่อสำเร็จแล้ว',
                 icon: 'success',
                 showCancelButton: false,
                 confirmButtonColor: '#3085d6',
                 confirmButtonText: 'ยืนยัน'
             }).then((result2) => {
                 
                 if (result2.isConfirmed) {
                     window.location.href = '.././'; 
                 }
             });
         </script>";
    }
} catch (PDOException $e) {
    echo "เกิดข้อผิดพลาดในการเชื่อมต่อฐานข้อมูล: " . $e->getMessage();
}
