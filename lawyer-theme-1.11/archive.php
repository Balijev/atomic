<?php get_header(); ?>

<section class="section archive-section" style="padding: 6rem 1.5rem 4rem;">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 300px; gap: 3rem;">
            <main>
                <header class="archive-header text-left mb-12">
                    <p class="section-badge"><?php esc_html_e('Arhiva', 'lehoia'); ?></p>
                    <h1 class="section-title font-serif"><?php
                        if (is_post_type_archive()) {
                            post_type_archive_title();
                        } elseif (is_category()) {
                            single_cat_title();
                        } elseif (is_tag()) {
                            single_tag_title();
                        } elseif (is_author()) {
                            echo esc_html(get_the_author());
                        } elseif (is_day()) {
                            printf(esc_html__('Dnevna arhiva: %s', 'lehoia'), get_the_date());
                        } elseif (is_month()) {
                            printf(esc_html__('Mesečna arhiva: %s', 'lehoia'), get_the_date('F Y'));
                        } elseif (is_year()) {
                            printf(esc_html__('Godišnja arhiva: %s', 'lehoia'), get_the_date('Y'));
                        } else {
                            esc_html_e('Arhiva', 'lehoia');
                        }
                    ?></h1>
                    <?php if (is_category() || is_tag() || is_author()) : ?>
                        <p class="hero-description" style="color: hsl(var(--muted-foreground));">
                            <?php echo strip_tags(term_description()); ?>
                        </p>
                    <?php endif; ?>
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
                                    <div class="text-muted" style="margin-bottom:1rem; color: hsl(var(--muted-foreground));">
                                        <?php echo get_the_date(); ?> • <?php the_author_posts_link(); ?>
                                    </div>
                                    <p class="text-muted"><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                                    <a href="<?php the_permalink(); ?>" style="color: hsl(var(--primary)); font-weight:600; text-decoration:none;">Pročitaj više →</a>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    </div>

                    <div class="pagination-nav mt-16 text-center">
                        <div style="display:inline-flex; gap:1rem;">
                            <?php if (get_previous_posts_link()) : ?>
                                <div><?php previous_posts_link('← Prethodna'); ?></div>
                            <?php endif; ?>
                            <?php if (get_next_posts_link()) : ?>
                                <div><?php next_posts_link('Sledeća →'); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="no-results" style="color: hsl(var(--muted-foreground));">
                        <p><?php esc_html_e('Nema sadržaja u ovoj arhivi.', 'lehoia'); ?></p>
                        <?php get_search_form(); ?>
                    </div>
                <?php endif; ?>
            </main>

            <?php get_sidebar(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>