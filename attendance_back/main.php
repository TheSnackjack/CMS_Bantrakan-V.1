<div class="main-content">

	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="card">
				<div class="card-header card-header-text">
					<h3 class="card-title">เช็คชื่อย้อนหลัง</h3>

					<div class="container mt-2">
						<form action="" method="get">

							<div class="col-lg-3 col-md-3 col-sm-3 mb-2">
								<input type="date" class="form-control mb-2" id="selectDate" name="selectDate" value="selectDate" required>

								<select class="form-select" aria-label="Default select example" name="cl" id="cl">
									<option value="อ.2">อนุบาล 2</option>
									<option value="อ.3">อนุบาล 3</option>
									<option value="ป.1">ประถมศึกษาปีที่ 1</option>
									<option value="ป.2">ประถมศึกษาปีที่ 2</option>
									<option value="ป.3">ประถมศึกษาปีที่ 3</option>
									<option value="ป.4">ประถมศึกษาปีที่ 4</option>
									<option value="ป.5">ประถมศึกษาปีที่ 5</option>
									<option value="ป.6">ประถมศึกษาปีที่ 6</option>

									<!-- เพิ่มตัวเลือกเพิ่มเติมตามต้องการ -->
								</select>
							</div>
							<div class=""><button type="submit" class="btn btn-outline-secondary">ดูข้อมูล</button></div>

						</form>
					</div>

					<?php

					$selectDate = $_GET['selectDate'];
					$cl = $_GET['cl']

					?>

					<h4 class="text-success" style="margin-top: 15px;">
						<?php

						if ($selectDate != "") {
							$timestamp = strtotime($selectDate);
							$new_date = date("d/m/Y", $timestamp);
							echo "วันที่" . " " . $new_date;
						}

						?>
					</h4>

				</div>
			</div>
		</div>
	</div>



	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="card">
				<div class="card-content table-responsive">


					<table class="table table-hover">
						<thead class="text-primary">
							<tr>
								<th>เลขประจำตัว</th>
								<th>ชื่อ-นามสกุล</th>
								<th>ชั้น</th>
								<th>เช็คเวลาเรียน</th>
							</tr>
						</thead>

						<!---เปิด query----->

						<?php

						try {
							$sql = "SELECT * FROM student WHERE std_class = '$cl' && std_status = 1 ";
							$stmt = $pdo->query($sql); ?>

							<form method="post" action="./attendance_back/process_form.php">

								<?php
								// ตรวจสอบว่ามีข้อมูลที่ดึงมาหรือไม่
								if ($stmt->rowCount() > 0) {
									// วนลูปแสดงข้อมูลที่ดึงมาทั้งหมด
									while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {


										// แสดงข้อมูลที่คุณต้องการ
										// echo "ชื่อผู้ใช้: " . $row["std_id"] . "<br>";
										// echo "อีเมล์: " . $row["std_fname"] . "<br>";
										// echo "-------------------<br>";

								?>

										<tbody>
											<tr>
												<td><?php echo $row["std_stdid"] ?> </td>
												<td><?php echo $row["std_prefix"] . $row["std_fname"] . "  " . $row["std_lname"] ?></td>
												<td><?php echo $row["std_class"] ?></td>


												<td>
													<!-- เช็ค มา ลา ขาด -->
													<select name="student_<?php echo $row["std_stdid"] ?>_date_<?php echo $selectDate ?>" id="student_<?php echo $row["std_stdid"] ?>_date_<?php echo $selectDate ?>">
														<option value="ม">ม</option>
														<option value="ล">ล</option>
														<option value="ข">ข</option>
														<!-- เพิ่มตัวเลือกเพิ่มเติมตามต้องการ -->
													</select>

												</td>


											</tr>
										</tbody>


									<?php } ?> <!---จบ loop---->

					</table>

					<button type="submit" class="btn btn-outline-primary">บันทึก</button>
					</form>



				<?php } else {
				?>

					<h1 class="text-center text-danger">เลือกวันที่และชั้นเรียนที่ต้องการเช็คชื่อย้อนหลัง</h1>

			<?php
								}
							} catch (PDOException $e) {
								echo "การค้นหาข้อมูลผิดพลาด: " . $e->getMessage();
							}
			?> <!---ปิด qurey---->


				</div>
			</div>

		</div>

	</div>

	<!---จบบันถึกสถิติมาเรียน---->

</div>