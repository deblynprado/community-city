<?php get_header(); ?>
<section class="news">
	<h1 class="sr-only"><?php _e( "News", "commcitytheme" ); ?></h1>
	<div class="container">

		<?php
			$sticky = get_option( 'sticky_posts' );
			if ( !empty( $sticky ) ) :
				$sticky_query = new WP_Query( 'p=' . $sticky[0] );

				if ( $sticky_query->have_posts() ) : while ( $sticky_query->have_posts() ) : $sticky_query->the_post();
		?>
			<article class="news-feature" itemscope itemtype="http://schema.org/BlogPosting">
				<div class="row">
					<h2 class="title text-center" itemprop="headline"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				</div>
				<div class="row">
					<div class="col-xs-7 excerpt" itemprop="articleBody">
						<p><?php the_excerpt(); ?></p>
					</div>
					<div class="col-xs-5">
						<figure class="thumb">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?></a>
						</figure>
					</div>
				</div>
			</article>
		<?php endwhile; endif; endif; wp_reset_postdata(); ?>

		<?php if ( have_posts() ) : ?>
			<div class="row">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="col-md-4">
						<article class="article" itemscope itemtype="http://schema.org/BlogPosting">
							<figure class="thumb">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?></a>
							</figure>
							<h3 class="title" itemprop="headline"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
							<span class="excerpt" itemprop="articleBody"><?php the_excerpt(); ?></span>
						</article>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php get_footer(); ?>
