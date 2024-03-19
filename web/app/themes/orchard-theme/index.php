<?php
get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main home">

	        <?php
				$title = get_field('title');

				$content = get_field('content');
				preg_match_all('/<p[^>]*>(.*?)<\/p>/', $content, $matches);
				$paragraphs = $matches[1];


				$images_content = get_field('images');
				$images = array();
				preg_match_all('/<img[^>]+src="([^">]+)"/', $images_content, $matches);
				if(!empty($matches) && !empty($matches[1])){
    				$images = $matches[1];
				}
			?>
			<div class="container main-content my-9">
			<div class="row g-3 mb-4 d-flex align-items-stretch">
				<div class="col-6 col-lg-4 d-flex">
					<img src="<?php echo $images[0]; ?>" class="img-fluid w-100 align-self-stretch" alt="Nature Image">
				</div>
				<div class="col-6 col-lg-4 d-flex flex-column justify-content-between">
					<img src="<?php echo $images[1]; ?>" class="img-fluid mb-2" alt="Food Image">
					<img src="<?php echo $images[2]; ?>" class="img-fluid" alt="Asparagus Image">
				</div>
				<div class="col-12 col-lg-4 d-flex flex-column pt-1">
					<div class="mb-2">
						<h2 class="fw-light text-uppercase border-bottom border-secondary pb-1 mb-2"><?php echo $title; ?></h2>
						<p class="pb-2"><?php echo $paragraphs[0]; ?></p>
						<h6 class="pb-2 text-danger"><?php echo $paragraphs[1]; ?></h6>
						<p class="fw-bold pb-2"><?php echo $paragraphs[2]; ?></p>
					</div>
				</div>
			</div>
			</div>



			<?php

	        while(have_posts()) : the_post();
		        ?>

                <section>
			        <?php the_title('<h1>', '</h1>'); ?>

			        <?php
			        the_content();
			        ?>
                </section>

		        <?php
	        endwhile; // End of the loop.
	        ?>
			

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();