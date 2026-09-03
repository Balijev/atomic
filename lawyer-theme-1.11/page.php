<?php get_header(); ?>

<section class="section page-section" style="padding: 6rem 1.5rem 4rem;">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 300px; gap: 3rem;">
            <main>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <article class="page-article">
                        <header class="entry-header text-left mb-12">
                            <h1 class="entry-title font-serif" style="font-size: 3rem; color: hsl(var(--foreground)); margin-bottom: 1rem;">
                                <?php the_title(); ?>
                            </h1>
                        </header>

                        <div class="entry-content" style="font-size: 1.125rem; line-height: 1.8; color: hsl(var(--muted-foreground));">
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