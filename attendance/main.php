<div class="main-content">

	<!---บันถึกสถิติมาเรียน---->

	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="card" style="padding-bottom: 10px;">
				<div class="card-header card-header-text">
					<h3 class="card-title">เช็คชื่อ<span class="text-success">
							<?php

							if ($date != "") {
								$timestamp = strtotime($date);
								$new_date = date("d/m/Y", $timestamp);
								echo "วันที่" . " " . $new_date;
							}

							?>
							</span5>
					</h3></br>

					<?php include_once("button.php"); ?>


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
								<th>เช็คชื่อ</th>
							</tr>
						</thead>

						<!---เปิด query----->

						<?php

						try {
							$sql = "SELECT * FROM student WHERE std_class = '$cl' && std_status = 1 ";
							$stmt = $pdo->query($sql); ?>

							<form method="post" action="./attendance/process_form.php">

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
													<select name="student_<?php echo $row["std_stdid"] ?>_date_<?php echo $date ?>" id="student_<?php echo $row["std_stdid"] ?>_date_<?php echo $date ?>">
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

					<h1 class="text-center text-danger">เลือกชั้นเรียนที่ต้องการเช็คชื่อ</h1>

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