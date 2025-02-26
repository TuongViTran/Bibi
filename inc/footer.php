</div>
   <div class="footer">
   	  <div class="wrapper">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>VỀ CHÚNG TÔI</h4>
						<ul>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Câu chuyện thương hiệu</a></li>
						<li><a href="#"><span>Tin tức</span></a></li>
						<li><a href="#">Tuyển dụng</a></li>
						<li><a href="#"><span>Liên hệ </span></a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Why buy from us</h4>
						<ul>
						<li><a href="about.php">About Us</a></li>
						<li><a href="faq.php">Chính sách đổi hàng</a></li>
						<li><a href="#">Chính sách trả hàng </a></li>
						<li><a href="contact.php"><span>Chính sách giao nhận</span></a></li>
						<li><a href="preview.php"><span>Chính sách bảo mật</span></a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>TƯ VẤN</h4>
						<ul>
							<li><a href="contact.php">Tư vấn phong cách</a></li>
							<li><a href="#">Tư vấn chọn size</a></li>
							<li><a href="#">Hỏi đáp </a></li>
					
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contact</h4>
						<ul>
							<li><span>+88-01713458599</span></li>
							<li><span>+88-01813458552</span></li>
						</ul>
						<div class="social-icons">
							<h4>Follow Us</h4>
					   		  <ul>
							      <li class="facebook"><a href="#" target="_blank"> </a></li>
							      <li class="twitter"><a href="#" target="_blank"> </a></li>
							      <li class="googleplus"><a href="#" target="_blank"> </a></li>
							      <li class="contact"><a href="#" target="_blank"> </a></li>
							      <div class="clear"></div>
						     </ul>
   	 					</div>
				</div>
			</div>
			<div class="copy_right">
				<p> Hân hạnh được phục phụ các bạn </p>
		   </div>
     </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
    <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
	  <script defer src="js/jquery.flexslider.js"></script>
	  <script type="text/javascript">
		$(function(){
		  SyntaxHighlighter.all();
		});
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	  </script>
</body>
</php>
