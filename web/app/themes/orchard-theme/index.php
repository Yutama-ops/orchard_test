<?php
get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main home">

	        <?php
				
				$title = get_field('title');

				$content = get_field('content');
				
				// can build a cleaner php if i have ACF pro
				$image_1 = get_field('image_1');
				$image_2 = get_field('image_2');
				$image_3 = get_field('image_3');
				
			?>
			<div class="container main-content my-9">
			<div class="row g-3 mb-4 d-flex align-items-stretch">
				<div class="col-6 col-lg-4 d-flex">
					<img src="<?php echo $image_1; ?>" class="img-fluid w-100 align-self-stretch" alt="Nature Image">
				</div>
				<div class="col-6 col-lg-4 d-flex flex-column justify-content-between">
					<img src="<?php echo $image_2; ?>" class="img-fluid mb-2" alt="Food Image">
					<img src="<?php echo $image_3; ?>" class="img-fluid" alt="Asparagus Image">
				</div>
				<div class="col-12 col-lg-4 d-flex flex-column pt-1">
					<div class="mb-2">
						<h2 class="fw-light text-uppercase border-bottom border-secondary pb-1 mb-2"><?php echo $title; ?></h2>
						<?php if(isset($content)) {
							echo $content; 
						}?>
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