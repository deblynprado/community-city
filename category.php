<?php get_header(); ?>
  <div class="container">
    <div class="col-xs-12 page-title">
      <h1><?php single_cat_title( '', true ); ?></h1>
      <p class="category-desc">
        <?php echo category_description(); ?>
      </p>
    </div>

    <div class="row">
      <div class="col-sm-8 primary">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <div class="col-md-6">
            <article itemscope itemtype="http://schema.org/BlogPosting">
              <header>
                <a href="<?php the_permalink(); ?>">
                  <figure>
                    <?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?>
                  </figure>
                </a>
                <a href="<?php the_permalink(); ?>"><h2 class="post-title" itemprop="headline"><?php the_title(); ?></h2></a>
                <p class="metadata sr-only">
                  Publicado por: <a href="#" itemprop="author" itemscope itemtype="http://schema.org/Person"><span itemprop="name"><?php the_author(); ?></span></a> em <span itemprop="datePublished" content="2015-01-22"><?php the_date(); ?></span> na categoria <?php the_category( ', ' ); ?>
                </p>
              </header>
              <div class="content" itemprop="description">
                <?php the_excerpt(); ?>
              </div>
            </article>
          </div>
        <?php endwhile; ?>
          <div class="col-xs-12">
            <div class="pagination">
              <?php
                $paginate_args = array(
                  'base'               => '%_%',
                  'format'             => '?page=%#%',
                  'total'              => 1,
                  'current'            => 0,
                  'show_all'           => False,
                  'end_size'           => 1,
                  'mid_size'           => 2,
                  'prev_next'          => True,
                  'prev_text'          => '« Mais antigos',
                  'next_text'          => 'Mais recentes »',
                  'type'               => 'plain',
                  'add_args'           => False,
                  'add_fragment'       => '',
                  'before_page_number' => '',
                  'after_page_number'  => ''
                );
                paginate_links( $paginate_args );
              ?>
            </div>
          </div>
        <?php else: ?>
          <p>Henhum post encontrado</p>
        <?php endif; ?> ?>
      </div>

      <?php get_sidebar(); ?>

    </div>
  </div>


<?php get_footer(); ?>
