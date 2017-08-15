	<section id="add">
		<center>
			<h1>Google Adsense Area</h1>
		</center>
	</section>

	<footer>
		<div id="footer">
			<div class="container">
				<div class="row">
					<div class="col-sm-5">
						<p>Copyright 2017 &copy; All Rights Reserved  <a href="#"><img src="img/logo.png" width="100px" height="40px"></a></p>
						<p style="font-weight: 700;">Developed By: <span style="color: green;">Green</span><span style="color: darkgreen">Cycle</span><span style="color: red">IT</span></p>
					</div>
					<div class="col-sm-5">
						<div id="lower-icon">
							<ul>
							  <li><a href="#" data-toggle="tooltip" data-placement="top" title="Home"><img src="img/003-internet.png"></a>Home</li>
							  <li><a href="#" data-toggle="tooltip" data-placement="top" title="About"><img src="img/001-info.png"></a>About</li>
							  <li><a href="#" data-toggle="tooltip" data-placement="top" title="Message Us"><img src="img/002-mail.png"></a>Mail</li><br>
							  <div style="background: lightgreen; padding-bottom: 0px;">
							  		<button type="submit" style="background: blue; color: white; float: right; right: 0px;">Follow Us >></button>
							  </div>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div id="share">
							<ul>
								<li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><img src="img/008-facebook.png"></a></li>
								<li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><img src="img/007-twitter.png"></a></li>
								<li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><img src="img/006-youtube.png"></a></li>
								<li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Linkdin"><img src="img/005-linkedin.png"></a></li>
								<li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Blog"><img src="img/003-rss.png"></a></li>
								<li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Vimeo"><img src="img/001-vimeo.png"></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>


<script>
	$(document).ready(function(){
	    $('[data-toggle="tooltip"]').tooltip();

	    var readURL = function(input) {
	        if (input.files && input.files[0]) {
	            var reader = new FileReader();

	            reader.onload = function (e) {
	                $('.profile-pic').attr('src', e.target.result);
	            }
	    
	            reader.readAsDataURL(input.files[0]);
	        }
	    }
    

	    $(".file-upload").on('change', function(){
	        readURL(this);
	    });
    
	    $(".upload-button").on('click', function() {
	       $(".file-upload").click();
	    });

	    $('#pwd, #pwd2').on('keyup', function () {
		  if ($('#pwd').val() == $('#pwd2').val()) {
		    $('#message').html('Matched').css('color', 'green');
		  } else 
		    $('#message').html('Not Matching').css('color', 'red');
		});
	});
</script>

</body>
</html>