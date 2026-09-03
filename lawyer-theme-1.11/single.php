<?php get_header(); ?>

<section class="section single-post-section" style="padding: 6rem 1.5rem 4rem;">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 300px; gap: 3rem;">
            <main>
                <?php while (have_posts()) : the_post(); ?>
                    <article class="single-post-card" style="background: hsl(var(--secondary)); border: 1px solid hsl(var(--border)); border-radius: var(--radius); padding: 2.5rem;">
                        <header class="entry-header mb-8">
                            <h1 class="entry-title font-serif" style="font-size: 3rem; color: hsl(var(--foreground)); margin-bottom: 1rem;">
                                <?php the_title(); ?>
                            </h1>
                            <div class="entry-meta" style="color: hsl(var(--muted-foreground)); margin-bottom: 2rem;">
                                <?php echo get_the_date(); ?> • <?php the_author_posts_link(); ?>
                            </div>
                        </header>

                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail mb-8" style="margin-bottom: 2rem;">
                                <?php the_post_thumbnail('large', array('style' => 'width:100%; height:auto; border-radius: var(--radius); object-fit:cover;')); ?>
                            </div>
                        <?php endif; ?>

                        <div class="entry-content" style="font-size: 1.125rem; line-height: 1.8; color: hsl(var(--muted-foreground));">
                            <?php the_content(); ?>
                        </div>

                        <footer class="entry-footer mt-8 pt-8" style="border-top: 1px solid hsl(var(--border));">
                            <p style="color: hsl(var(--muted-foreground));"><?php esc_html_e('Tags:', 'lehoia'); ?> <?php the_tags('', ', ', ''); ?></p>
                        </footer>
                    </article>
                <?php endwhile; ?>

                <section class="related-posts mt-16" style="border-top: 1px solid hsl(var(--border)); padding-top: 2rem;">
                    <h2 class="section-title font-serif" style="font-size: 2rem;">Srodni postovi</h2>
                    <div class="grid grid-3 mt-8">
                        <?php
                        $related_posts = get_posts(array(
                            'posts_per_page' => 3,
                            'post__not_in'   => array(get_the_ID()),
                            'category__in'   => wp_get_post_categories(get_the_ID()),
                        ));

                        if ($related_posts) :
                            foreach ($related_posts as $post) : setup_postdata($post); ?>
                                <article class="card">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('medium', array('style' => 'width:100%; height:auto; object-fit:cover;')); ?>
                                        </a>
                                    <?php endif; ?>
                                    <div class="card-content">
                                        <h3 class="font-serif font-semibold mb-4"><a href="<?php the_permalink(); ?>" style="text-decoration:none; color:inherit;"><?php the_title(); ?></a></h3>
                                        <p class="text-muted"><?php echo wp_trim_words(get_the_excerpt(), 18, '...'); ?></p>
                                    </div>
                                </article>
                            <?php endforeach; wp_reset_postdata();
                        else : ?>
                            <p style="color: hsl(var(--muted-foreground));"><?php esc_html_e('Nema srodnih postova za prikaz.', 'lehoia'); ?></p>
                        <?php endif; ?>
                    </div>
                </section>
            </main>

            <?php get_sidebar(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>