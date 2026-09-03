<?php get_header(); ?>

<div class="container" style="padding: 6rem 1.5rem 4rem;">
    <header class="archive-header text-center mb-16">
        <p class="section-badge">Pravne usluge</p>
        <h1 class="section-title font-serif">Naša područja prakse</h1>
        <p class="hero-description" style="text-align: center;">Sveobuhvatna pravna ekspertiza u više pravnih oblasti kako bismo zadovoljili sve vaše pravne potrebe.</p>
    </header>

    <?php if (have_posts()) : ?>
        <div class="grid grid-3">
            <?php while (have_posts()) : the_post(); ?>
                <article class="card practice-area-card">
                    <?php if (has_post_thumbnail()) : ?>
                        <div style="aspect-ratio: 16/9; overflow: hidden;">
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" style="width: 100%; height: 100%; object-fit: cover; transition: var(--transition-smooth);">
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="card-content">
                        <h2 class="font-serif font-semibold mb-4" style="color: hsl(var(--primary)); font-size: 1.5rem;">
                            <a href="<?php the_permalink(); ?>" style="text-decoration: none; color: inherit; transition: var(--transition-smooth);">
                                <?php the_title(); ?>
                            </a>
                        </h2>

                        <?php if (has_excerpt()) : ?>
                            <p class="text-muted mb-6"><?php the_excerpt(); ?></p>
                        <?php else : ?>
                            <p class="text-muted mb-6"><?php echo wp_trim_words(get_the_content(), 20, '...'); ?></p>
                        <?php endif; ?>

                        <a href="<?php the_permalink(); ?>" style="color: hsl(var(--primary)); font-weight: 600; text-decoration: none; transition: var(--transition-smooth);">
                            Saznajte više →
                        </a>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <?php if (get_next_posts_link() || get_previous_posts_link()) : ?>
            <nav class="pagination-nav mt-16 text-center">
                <div style="display: inline-flex; gap: 1rem;">
                    <?php if (get_previous_posts_link()) : ?>
                        <div><?php previous_posts_link('← Previous'); ?></div>
                    <?php endif; ?>

                    <?php if (get_next_posts_link()) : ?>
                        <div><?php next_posts_link('Next →'); ?></div>
                    <?php endif; ?>
                </div>
            </nav>
        <?php endif; ?>

    <?php else : ?>
        <div class="no-posts text-center py-20">
            <h2 class="font-serif mb-4" style="font-size: 2rem; color: hsl(var(--foreground));">Nisu pronađena područja prakse</h2>
            <p class="text-muted mb-8">Trenutno ažuriramo naša područja prakse. Molimo Vas da provjerite ponovo uskoro.</p>
            <a href="<?php echo home_url(); ?>" class="btn btn-gold">Povratak na početnu stranicu</a>
        </div>
    <?php endif; ?>

    <!-- Call to Action -->
    <section class="cta-section mt-20 pt-20" style="border-top: 1px solid hsl(var(--border));">
        <div class="text-center">
            <h3 class="font-serif mb-4" style="font-size: 2rem; color: hsl(var(--foreground));">Ne vidite svoj pravni problem?</h3>
            <p class="text-muted mb-8">Bavimo se širokim spektrom pravnih pitanja. Kontaktirajte nas da razgovaramo o vašim specifičnim potrebama.</p>
            <div style="display: flex; flex-direction: column; gap: 1rem; justify-content: center; align-items: center;">
                <a href="#contact" class="btn btn-gold btn-lg">Besplatne konsultacije</a>
                <a href="tel:<?php echo get_theme_mod('phone_number', '064/411 53 01'); ?>" class="btn btn-gold-outline btn-lg">
                    Pozovi <?php echo get_theme_mod('phone_number', '064/411 53 01'); ?>
                </a>
            </div>
        </div>
    </section>
</div>

<style>
    .practice-area-card:hover img {
        transform: scale(1.05);
    }

    .practice-area-card:hover h2 a {
        color: hsl(var(--primary));
    }

    .pagination-nav a {
        color: hsl(var(--primary));
        text-decoration: none;
        padding: 0.75rem 1.5rem;
        border: 2px solid hsl(var(--primary));
        border-radius: var(--radius);
        transition: var(--transition-smooth);
    }

    .pagination-nav a:hover {
        background: hsl(var(--primary));
        color: hsl(var(--primary-foreground));
    }
</style>

<?php get_footer(); ?>