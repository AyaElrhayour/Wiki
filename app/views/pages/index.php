<!doctype html>
<html lang="en">
<?php require APPROOT . '/views/inc/header.php'; ?>

<body>



	<!-- Start Categories -->
	<section class="section bg-light">
		<div class="container">

			<div class="row align-items-stretch retro-layout">
				<?php foreach ($data["categories"] as $category) { ?>
					<div class="col-md-4">
						<a href="<?php echo URLROOT; ?>/wikis/<?php echo $category->__get('id'); ?> " class="h-entry mb-30 v-height gradient">
							<div class="featured-img" style="background-image: url('<?php echo URLROOT; ?>/img/<?php echo $category->__get("image"); ?>');"></div>

							<div class="text">
								<h2><?php echo $category->__get("name"); ?></h2>
							</div>
						</a>
					</div>
				<?php
				}  ?>
			</div>
		</div>
	</section>
	<!-- End Categories -->

	<!-- Start Wikis -->
	<section class="section">
		<div class="container">

			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Most Popular Wikis</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
			</div>

			<div class="row">
				<?php foreach ($data["wikis"] as $wiki) { ?>
					<div class="col-lg-4 mb-4">
						<div class="post-entry-alt">
							<a href="#" class="img-link"><img src="<?php echo $wiki->__get("image"); ?>" alt="Image" class="img-fluid"></a>
							<div class="excerpt">
								<h2><a href="#"><?php echo $wiki->__get("title"); ?></a></h2>

								<form action="<?php echo URLROOT; ?>/home/archivedWiki" method="post">
									<input type="hidden" name="id" value="<?= $wiki->__get("id"); ?>">
									<button type="submit" name="archive">archive</button>
								</form>

								<div class="post-meta align-items-center text-left clearfix">
									<span><?php echo $wiki->__get("date"); ?></span>
								</div>
								<p><?php echo $wiki->__get("content"); ?></p>
								<p><a href="<?php echo URLROOT; ?>/SingleWiki/<?php echo $wiki->__get('id'); ?>" class="read-more">Continue Reading</a></p>
							</div>
						</div>
					</div>
				<?php
				}  ?>



			</div>

		</div>
	</section>
	<!-- End Wikis -->
	<?php require APPROOT . '/views/inc/footer.php'; ?>
</body>

</html>