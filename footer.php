<footer class="footer">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<p class="copyright d-flex justify-content-end">
					&copy Developed By Wutcharawit N. CMS_bantrakanschool_v1
				</p>
			</div>
		</div>
	</div>

</footer>
</div>
</div>



<!----------html code compleate----------->









<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>


<script type="text/javascript">
	$(document).ready(function() {
		$("#sidebar-collapse").on('click', function() {
			$('#sidebar').toggleClass('active');
			$('#content').toggleClass('active');
		});

		$(".more-button,.body-overlay").on('click', function() {
			$('#sidebar,.body-overlay').toggleClass('show-nav');
		});

	});
</script>





</body>

</html>