<?php 
include("$_SERVER[DOCUMENT_ROOT]/Front/core/blog.php");
$post = getpost($_GET['postid']);
foreach ($post as $key) {
	$usrid=$key['user_id'];
}
$user= 	getPostAuthorById($usrid);
 foreach ($post as $row) {
 ?>

<!DOCTYPE HTML>
<html>
	<?php include('header.php'); ?>
		<div class="colorlib-blog">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center animate-box intro-heading">
						<h2></h2>
						<p></p>
					</div>
				</div>
				<div class="postdiv">
				 <article itemscope itemtype="http://schema.org/BlogPosting" class="post">
				 	<br>
				 	<figure itemscope itemtype="http://schema.org/ImageObject">
  <img itemprop="image" src="<?php echo'../images/postcontent/'.$row['image']; ?>" alt="A descriptive alt" class="featured-image">
  <figcaption itemprop="caption">An image caption by <span itemprop="author"><a href="<?php echo"https://www.facebook.com/oussama.nouri.33";?>" rel="author">Nouri</a></span></figcaption>
  </figure>

  <header class="post-header">
      <h2 itemprop="headline" class="post-title" style="text-align: center;"><?php echo $row['title'] ?></h2>
    
      <p class="post-meta" style="text-align: center;">Posted on <time datetime="2015-06-05T17:44-07:00" itemprop="datePublished"><?php echo $row['created_at'] ?></time> by <span itemprop="author"><a rel="author" href="#googleplusURL"><?php foreach($user as $usrname){echo $usrname['username'];}?></a></span></p>
  </header>

    <p itemprop="description" class="post-intro"><?php echo $row['description'] ?></p>
  
  <div itemprop="articleBody" class="post-body">
    <p><?php echo $row['body'] ?></p>
    
    
      
    
  </div>

  <footer class="post-footer">
    
    <p class="comments-link"><a href="#" itemprop="discussionUrl">Leave a Comment</a> (<a href="#" itemprop="discussionUrl"><span itemprop="commentCount">3</span></a>)</p>
  </footer>

</article>
</div>
			</div>
		</div>

		<footer>
			<div id="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-pb-sm">
							<h2>Lutong Bahay</h2>
							<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind.</p>
							<p class="colorlib-social-icons">
								<a href="#"><i class="icon-facebook4"></i></a>
								<a href="#"><i class="icon-twitter3"></i></a>
								<a href="#"><i class="icon-googleplus"></i></a>
								<a href="#"><i class="icon-dribbble2"></i></a>
							</p>
						</div>
						<div class="col-md-3 col-pb-sm">
							<h2>Latest Blog</h2>
							<div class="f-entry">
								<a href="#" class="featured-img" style="background-image: url(images/dish-5.jpg);"></a>
								<div class="desc">
									<span>May 5, 2018</span>
									<h3><a href="#">How to cook beef Grilled with potato</a></h3>
								</div>
							</div>
							<div class="f-entry">
								<a href="#" class="featured-img" style="background-image: url(images/dish-7.jpg);"></a>
								<div class="desc">
									<span>May 5, 2018</span>
									<h3><a href="#">A Japanese Master Chef</a></h3>
								</div>
							</div>
							<div class="f-entry">
								<a href="#" class="featured-img" style="background-image: url(images/dessert-3.jpg);"></a>
								<div class="desc">
									<span>May 5, 2018</span>
									<h3><a href="#">Special Recipe for this month</a></h3>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-pb-sm">
							<h2>Instagram</h2>
							<div class="instagram">
								<a href="#" class="insta-img" style="background-image: url(images/dessert-1.jpg);"></a>
								<a href="#" class="insta-img" style="background-image: url(images/dessert-2.jpg);"></a>
								<a href="#" class="insta-img" style="background-image: url(images/dish-9.jpg);"></a>
								<a href="#" class="insta-img" style="background-image: url(images/dish-2.jpg);"></a>
							</div>
						</div>
						<div class="col-md-3 col-pb-sm">
							<h2>Newsletter</h2>
							<p>A small river named Duden flows by their place and supplies it with the necessary regelialia</p>
							<div class="subscribe text-center">
								<div class="form-group">
									<input type="text" class="form-control text-center" placeholder="Enter Email address">
									<input type="submit" value="Subscribe" class="btn btn-primary btn-custom">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 text-center">
							<p>
								<span class="block">&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --><br></span> 
								<span class="block">Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a> &amp; <a href="https://www.pexels.com/" target="_blank">Pexel</a></span>
							</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	
	</div>

	<!-- jQuery -->
	<script src="../js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="../js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="../js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="../js/jquery.waypoints.min.js"></script>
	<!-- Parallax -->
	<script src="../js/jquery.stellar.min.js"></script>
	<!-- Owl Carousel -->
	<script src="../js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="../js/jquery.magnific-popup.min.js"></script>
	<script src="../js/magnific-popup-options.js"></script>
	<!-- Flexslider -->
	<script src="../js/jquery.flexslider-min.js"></script>
	<!-- Date Picker -->
	<script src="../js/bootstrap-datepicker.js"></script>

	<!-- Main JS (Do not remove) -->
	<script src="../js/main.js"></script>

	</body>
</html>
<?php }?>

