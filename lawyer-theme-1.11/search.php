<?php get_header(); ?>

<section class="section search-results-section" style="padding: 6rem 1.5rem 4rem;">
    <div class="container">
        <header class="archive-header text-center mb-16">
            <p class="section-badge">Pretraga</p>
            <h1 class="section-title font-serif">Rezultati pretrage za: <?php echo esc_html(get_search_query()); ?></h1>
            <p class="hero-description" style="color: hsl(var(--muted-foreground));">Pronađite relevantne stranice i objave za vaše upite na sajtu.</p>
        </header>

        <?php if (have_posts()) : ?>
            <div class="grid grid-3">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="card search-result-card" style="padding: 1.5rem; border: 1px solid hsl(var(--border)); border-radius: var(--radius);">
                        <h2 class="font-serif font-semibold mb-4" style="color: hsl(var(--primary)); font-size: 1.5rem;">
                            <a href="<?php the_permalink(); ?>" style="text-decoration: none; color: inherit; transition: var(--transition-smooth);"><?php the_title(); ?></a>
                        </h2>
                        <p class="text-muted mb-4" style="color: hsl(var(--muted-foreground));"><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                        <a href="<?php the_permalink(); ?>" style="color: hsl(var(--primary)); font-weight: 600; text-decoration: none; transition: var(--transition-smooth);">Pogledajte detalje →</a>
                    </article>
                <?php endwhile; ?>
            </div>

            <div class="pagination-nav mt-16 text-center">
                <div style="display: inline-flex; gap: 1rem;">
                    <?php if (get_previous_posts_link()) : ?>
                        <div><?php previous_posts_link('← Prethodna'); ?></div>
                    <?php endif; ?>
                    <?php if (get_next_posts_link()) : ?>
                        <div><?php next_posts_link('Sledeća →'); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        <?php else : ?>
            <div class="no-results" style="max-width: 48rem; margin: 0 auto; color: hsl(var(--muted-foreground));">
                <p>Nije pronađen nijedan rezultat. Pokušajte ponovo sa drugačijim pojmom za pretragu.</p>
                <?php get_search_form(); ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>