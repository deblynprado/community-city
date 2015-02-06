<?php
/*
Template Name: Page with Sidebar
*/
?>
<?php get_header() ?>
<div class="single post-lorem-ipsum">
	<div class="container">
		<div class="row">
			<div class="col-md-8 primary">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article itemscope itemtype="http://schema.org/BlogPosting">
					<header>
						<figure><?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?></figure>
						<h2 class="post-title" itemprop="headline"><?php the_title(); ?></h2>
						<p class="metadata">
							Publicado por: <a href="" itemprop="author" itemscope itemtype="http://schema.org/Person"><span itemprop="name"><?php the_author(); ?></span></a> em <span itemprop="datePublished" content="<?php the_date( 'y-m-d' ); ?>"><?php the_date( 'd/m/Y' ); ?></span> na categoria <?php the_category( ', ' ); ?>
						</p>
					</header>
					<div class="content" itemprop="articleBody">
						<?php the_content(); ?>
					</div>
				</article>
			<?php endwhile; ?>
			<!-- post navigation -->
		<?php else: ?>
		<!-- no posts found -->
	<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
