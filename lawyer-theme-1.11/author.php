<?php get_header(); ?>

<section class="section author-section" style="padding: 6rem 1.5rem 4rem;">
    <div class="container">
        <header class="archive-header text-center mb-16">
            <div class="section-badge"><?php esc_html_e('Autor', 'lehoia'); ?></div>
            <h1 class="section-title font-serif"><?php echo get_the_author(); ?></h1>
            <p class="hero-description" style="color: hsl(var(--muted-foreground));">
                <?php echo esc_html(get_the_author_meta('description')); ?>
            </p>
        </header>

        <?php if (have_posts()) : ?>
            <div class="grid grid-3">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="card archive-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium', array('style' => 'width:100%; height:auto; object-fit:cover;')); ?>
                            </a>
                        <?php endif; ?>
                        <div class="card-content">
                            <h2 class="font-serif font-semibold mb-4"><a href="<?php the_permalink(); ?>" style="text-decoration:none; color:inherit;"><?php the_title(); ?></a></h2>
                            <p class="text-muted"><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                            <a href="<?php the_permalink(); ?>" style="color: hsl(var(--primary)); font-weight:600; text-decoration:none;">Pročitaj više →</a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <div class="pagination-nav mt-16 text-center">
                <div style="display:inline-flex; gap:1rem;">
                    <?php previous_posts_link('← Prethodna'); ?>
                    <?php next_posts_link('Sledeća →'); ?>
                </div>
            </div>
        <?php else : ?>
            <div class="no-results" style="color: hsl(var(--muted-foreground));">
                <p><?php esc_html_e('Nema postova za ovog autora.', 'lehoia'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>