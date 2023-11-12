<div id="content">

	<!--top--navbar----design--------->

	<div class="top-navbar">
		<nav class="navbar  navbar-expand-lg">
			<button type="button" id="sidebar-collapse" class="d-xl-block d-lg-block d-md-none d-none">
				<span class="material-icons">arrow_back_ios</span>
			</button>

			<p class="navbar-brand">ระบบเช็คชื่อ โรงเรียนบ้านตระการ</p>
			<button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle">
				<span class="material-icons">more_vert</span>
			</button>
			<div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarcollapse">

				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">

					<li class="nav-item">
						<a class="nav-link" href="#">วันที่ :

							<?php

							if ($date != "") {
								$timestamp = strtotime($date);
								$new_date = date("d/m/Y", $timestamp);
								echo $new_date;
							}

							?>
					</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="#"><span class="material-icons">person</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#"><span class="material-icons">settings</span></a>
					</li>

				</ul>

			</div>

		</nav>
	</div>