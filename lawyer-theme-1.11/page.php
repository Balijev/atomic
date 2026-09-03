<?php get_header(); ?>

<section class="section page-section">
    <div class="container">
        <div class="page-grid">
            <main>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <article class="page-article">
                        <header class="entry-header text-left mb-12">
                            <h1 class="entry-title entry-title-large font-serif">
                                <?php the_title(); ?>
                            </h1>
                        </header>

                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>
                    </article>
                <?php endwhile; endif; ?>
            </main>

            <?php get_sidebar(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
