<!-- process_form.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date Picker Form Result</title>
    <!-- นำเข้าไฟล์ CSS ของ Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Date Picker Form Result</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $startDate = $_POST["startDate"];
            echo "วันที่ที่เลือก: " . $startDate;
        }
        ?>
    </div>
    <!-- นำเข้าไฟล์ JavaScript ของ Bootstrap 5 (ต้องอยู่หลังการนำเข้า CSS) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
