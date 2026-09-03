<?php get_header(); ?>

<section class="section not-found-section" style="padding: 6rem 1.5rem 4rem; text-align: center;">
    <div class="container">
        <h1 class="section-title font-serif" style="font-size: 3rem; color: hsl(var(--foreground)); margin-bottom: 1rem;">404 - Stranica nije pronađena</h1>
        <p class="text-muted mb-8" style="color: hsl(var(--muted-foreground));">Izgleda da stranica koju tražite nije dostupna ili je premještena.</p>
        <?php get_search_form(); ?>
        <p class="mt-8"><a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-gold btn-xl">Povratak na početnu</a></p>
        <p class="mt-4" style="color: hsl(var(--muted-foreground));">Ako trebate pomoć, <a href="<?php echo esc_url(home_url('/#contact')); ?>" class="text-muted">kontaktirajte nas</a>.</p>
    </div>
</section>

<?php get_footer(); ?>