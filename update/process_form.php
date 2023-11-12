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
                $student_id = substr($key, 8, -13);


                // รับค่าสถานะของนักเรียน
                $status = $_POST[$key];

                // เตรียมและส่งคำสั่ง SQL สำหรับการเพิ่มข้อมูลลงในตาราง
                $stmt = $pdo->prepare("UPDATE attendance SET atd_status = :status WHERE atd_stdid = :student_id");
                $stmt->bindParam(':student_id', $student_id);

                $stmt->bindParam(':status', $status);

                // ประมวลผลคำสั่ง SQL
                $stmt->execute();
            }
        }

         // แก้ไขข้อมูลการมาเรียนสำเร็จแล้ว
         echo "_";
         echo "
             <script>
             
             Swal.fire({
                 title: 'สำเร็จ',
                 text: 'แก้ไขการเช็คชื่อสำเร็จแล้ว',
                 icon: 'success',
                 showCancelButton: false,
                 confirmButtonColor: '#3085d6',
                 confirmButtonText: 'ยืนยัน'
             }).then((result2) => {
                 
                 if (result2.isConfirmed) {
                     window.location.href = '../.././'; 
                 }
             });
         </script>";
    }
} catch (PDOException $e) {
    echo "เกิดข้อผิดพลาดในการเชื่อมต่อฐานข้อมูล: " . $e->getMessage();
}
