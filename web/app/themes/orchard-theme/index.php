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
			<section class="main-content my-9">
				<div class="container">
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
			</section>

		

			<section class="main-content my-9">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<h1 class="text-center py-5"><?php echo get_the_title(); ?></h1>
						</div>
					</div>
					<div class="row g-3 mb-4 d-flex">
						<?php
						// Define our WP Query Parameters
						$the_query = new WP_Query( 'posts_per_page=3' );
						
						// Start our WP Query
						while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
						<article class="col-12 col-md-6 col-lg-4">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
									<a href="<?php the_permalink(); ?>">
										<img src="<?php echo $featured_img_url; ?>" class="w-100 border-danger border-bottom border-5" alt="<?php the_title_attribute(); ?>"/>
									</a>
							<?php endif; ?>
							<a href="<?php the_permalink(); ?>"><h3 class="fw-bold"><?php the_title(); ?></h3></a>
							<p><?php the_excerpt(); ?></p>
							<a href="<?php the_permalink(); ?>" aria-label="Read more about <?php the_title_attribute(); ?>" class="read-more fw-bold border-danger border-bottom border-2 pb-1">Read More</a>
						</article>
						<?php endwhile; wp_reset_postdata(); ?>
					</div>
				</div>	
			</section>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();


