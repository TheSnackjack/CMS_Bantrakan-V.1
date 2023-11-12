<?php
// ข้อมูลสำหรับการเชื่อมต่อกับฐานข้อมูล MySQL
// $servername = "localhost"; // เช่น localhost หรือ 127.0.0.1
// $username = "bantra_kan"; // ชื่อผู้ใช้ MySQL
// $password = "Bantrakan"; // รหัสผ่าน MySQL
// $dbname = "bantrakan1"; // ชื่อฐานข้อมูลที่ต้องการเชื่อมต่อ

$servername = "localhost"; // เช่น localhost หรือ 127.0.0.1
$username = "root"; // ชื่อผู้ใช้ MySQL
$password = ""; // รหัสผ่าน MySQL
$dbname = "bantrakan1"; // ชื่อฐานข้อมูลที่ต้องการเชื่อมต่อ

try {
    // สร้างการเชื่อมต่อด้วย PDO
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // ตั้งค่าโหมด error เพื่อแสดงข้อผิดพลาดอย่างละเอียด
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "เชื่อมต่อกับฐานข้อมูลสำเร็จ!";
} catch (PDOException $e) {
    echo "การเชื่อมต่อไม่สำเร็จ: " . $e->getMessage();
}

//ตั้งค่าวันที่
date_default_timezone_set('Asia/Bangkok');
$date = date('y-m-d');
