<?php get_header(); ?>

<div class="container" style="padding: 6rem 1.5rem 4rem;">
    <?php while (have_posts()) : the_post(); ?>
        <article class="practice-area-single">
            <header class="entry-header text-center mb-8">
                <h1 class="entry-title font-serif" style="font-size: 3rem; font-weight: bold; color: hsl(var(--foreground)); margin-bottom: 1rem;">
                    <?php the_title(); ?>
                </h1>

                <?php if (has_excerpt()) : ?>
                    <p class="entry-excerpt" style="font-size: 1.25rem; color: hsl(var(--muted-foreground)); max-width: 48rem; margin: 0 auto;">
                        <?php the_excerpt(); ?>
                    </p>
                <?php endif; ?>
            </header>

            <?php if (has_post_thumbnail()) : ?>
                <div class="entry-image mb-8">
                    <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>" style="width: 100%; max-width: 48rem; margin: 0 auto; border-radius: var(--radius); box-shadow: var(--shadow-elegant); display: block;">
                </div>
            <?php endif; ?>

            <div class="entry-content" style="max-width: 48rem; margin: 0 auto; font-size: 1.125rem; line-height: 1.8; color: hsl(var(--muted-foreground));">
                <?php the_content(); ?>
            </div>

            <div class="entry-footer mt-8 pt-8" style="border-top: 1px solid hsl(var(--border)); text-align: center;">
                <h3 class="font-serif mb-4" style="font-size: 1.5rem; color: hsl(var(--foreground));">Trebate pravnu pomoć?</h3>
                <p class="mb-6" style="color: hsl(var(--muted-foreground));">Kontaktirajte nas danas za besplatne konsultacije o vašem <?php echo strtolower(get_the_title()); ?> slučaju.</p>
                <a href="#contact" class="btn btn-gold btn-lg">Besplatne konsultacije</a>
            </div>
        </article>
    <?php endwhile; ?>

    <!-- Related Practice Areas -->
    <?php
    $related_areas = get_posts(array(
        'post_type' => 'practice_areas',
        'posts_per_page' => 3,
        'post__not_in' => array(get_the_ID()),
        'orderby' => 'rand'
    ));

    if ($related_areas) : ?>
        <section class="related-practice-areas mt-16 pt-16" style="border-top: 1px solid hsl(var(--border));">
            <h3 class="text-center mb-8 font-serif" style="font-size: 2rem; color: hsl(var(--foreground));">Ostala područja prakse</h3>
            <div class="grid grid-3">
                <?php foreach ($related_areas as $area) : ?>
                    <div class="card">
                        <?php if (has_post_thumbnail($area->ID)) : ?>
                            <div style="aspect-ratio: 16/9; overflow: hidden;">
                                <img src="<?php echo get_the_post_thumbnail_url($area->ID, 'medium'); ?>" alt="<?php echo get_the_title($area->ID); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        <?php endif; ?>
                        <div class="card-content">
                            <h4 class="font-serif font-semibold mb-2" style="color: hsl(var(--primary)); font-size: 1.25rem;">
                                <a href="<?php echo get_permalink($area->ID); ?>" style="text-decoration: none; color: inherit;">
                                    <?php echo get_the_title($area->ID); ?>
                                </a>
                            </h4>
                            <p class="text-muted mb-4"><?php echo get_the_excerpt($area->ID); ?></p>
                            <a href="<?php echo get_permalink($area->ID); ?>" style="color: hsl(var(--primary)); font-weight: 600; text-decoration: none;">Saznajte više →</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>
</div>

<?php get_footer(); ?>