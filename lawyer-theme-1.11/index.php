<?php get_header(); ?>

<!-- Hero Section -->
<?php
$hero_subtitle = get_theme_mod('hero_subtitle', 'Ahmed Tomić');
$hero_title_primary = get_theme_mod('hero_title_primary', 'Broj #1 Advokat u');
$hero_title_secondary = get_theme_mod('hero_title_secondary', 'Tuzli, TK');
$hero_description = get_theme_mod('hero_description', 'Tražite vrhunsku pravnu pomoć? Advokat Ahmed Tomić nudi beskompromisnu posvećenost i dokazanu stručnost. Njegova praksa je utemeljena na povjerenju i rezultatima, čineći ga prvim izborom za sve koji traže sigurnost i profesionalizam u svijetu prava.');
$hero_button_primary_text = get_theme_mod('hero_button_primary_text', 'STUPITE U KONTAKT');
$hero_button_primary_url = get_theme_mod('hero_button_primary_url', '#contact');
$hero_button_secondary_text = get_theme_mod('hero_button_secondary_text', 'PODRUČJA PRAKSE');
$hero_button_secondary_url = get_theme_mod('hero_button_secondary_url', get_post_type_archive_link('practice_areas'));
$hero_image = get_theme_mod('hero_image', get_template_directory_uri() . '/assets/lawyer-hero.jpg');
?>
<section class="hero-section">
    <div class="hero-bg"></div>
    <div class="container">
        <div class="hero-content">
            <div class="split-content home-hero-left">
                <div class="subtitle-wrapper home-hero">
                    <div class="accent home-hero"></div>
                    <div class="subtitle white"><?php echo esc_html($hero_subtitle); ?></div>
                </div>
                <h1 class="title white home-hero font-serif">
                    <?php echo esc_html($hero_title_primary); ?>
                    <span style="display: block;"><?php echo esc_html($hero_title_secondary); ?></span>
                </h1>
                <p class="paragraph-large white home-hero">
                    <?php echo esc_html($hero_description); ?>
                </p>
                <div class="_2-buttons home-hero">
                    <a href="<?php echo esc_url($hero_button_primary_url); ?>" class="button-primary home-hero btn btn-gold btn-xl"><?php echo esc_html($hero_button_primary_text); ?></a>
                    <a href="<?php echo esc_url($hero_button_secondary_url); ?>" class="button-secondary white home-hero btn btn-gold-outline btn-xl"><?php echo esc_html($hero_button_secondary_text); ?></a>
                </div>
            </div>
            <div class="split-content home-hero-right">
                <div class="image-wrapper home-hero">
                    <img src="<?php echo esc_url($hero_image); ?>" alt="<?php echo esc_attr($hero_subtitle); ?>" class="image home-hero">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Awards Section 
<section class="section" style="background-color: hsl(var(--primary) / 0.1); border-top: 1px solid hsl(var(--primary) / 0.2); border-bottom: 1px solid hsl(var(--primary) / 0.2);">
    <div class="container">
        <div class="section-header">
            <p class="section-badge">Awards</p>
            <h2 class="section-title font-serif">Recognized Excellence</h2>
        </div>
        
        <div class="grid grid-4">
            <div class="text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/awards-badges.jpg" alt="Award Badge" style="width: 80px; height: 80px; margin: 0 auto 1rem; border-radius: 50%;">
                <h3 class="font-semibold">Best Lawyer 2023</h3>
            </div>
            <div class="text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/awards-badges.jpg" alt="Award Badge" style="width: 80px; height: 80px; margin: 0 auto 1rem; border-radius: 50%;">
                <h3 class="font-semibold">Top Attorney</h3>
            </div>
            <div class="text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/awards-badges.jpg" alt="Award Badge" style="width: 80px; height: 80px; margin: 0 auto 1rem; border-radius: 50%;">
                <h3 class="font-semibold">Legal Excellence</h3>
            </div>
            <div class="text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/awards-badges.jpg" alt="Award Badge" style="width: 80px; height: 80px; margin: 0 auto 1rem; border-radius: 50%;">
                <h3 class="font-semibold">Client Choice</h3>
            </div>
        </div>
    </div>
</section>
-->
<!-- Practice Areas Section -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <p class="section-badge">
                Područja prakse</p>
            <h2 class="section-title font-serif">Pravne usluge</h2>
        </div>

        <div class="grid grid-3">
            <div class="card">
                <div class="card-content">
                    <h3 class="font-serif font-semibold mb-4" style="color: hsl(var(--primary)); font-size: 1.5rem;">Nasledno Pravo</h3>
                    <p class="text-muted"> Specijalizovani za sastavljanje nasljednih izjava, ugovora o doživotnom izdržavanju i zastupanje na ostavinskim ročištima sa dokazanim iskustvom.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <h3 class="font-serif font-semibold mb-4" style="color: hsl(var(--primary)); font-size: 1.5rem;">Lična povreda</h3>
                    <p class="text-muted">Maksimalna odšteta za žrtve nesreća i povreda.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <h3 class="font-serif font-semibold mb-4" style="color: hsl(var(--primary)); font-size: 1.5rem;">Privredno pravo</h3>
                    <p class="text-muted">Sveobuhvatna pravna rješenja za preduzeća svih veličina.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="section" style="background-color: hsl(var(--secondary));">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center;">
            <div>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/lawyer-about.jpg" alt="About John Carter" style="width: 100%; border-radius: var(--radius); box-shadow: var(--shadow-elegant);">
            </div>
            <div>
                <p class="section-badge">O Advokatu</p>
                <h2 class="section-title font-serif">Ahmed Tomić</h2>
                <p class="text-muted mb-8">Sa preko 20 godina iskustva, Ahmed Tomić je uspješno zastupao stotine klijenata širom Tuzlanskog kantona. Njegova posvećenost pravdi i nepokolebljiva predanost klijentima donijeli su mu priznanje kao jednog od najboljih advokata u Tuzli.</p>
                <a href="#contact" class="btn btn-gold btn-lg">Saznajte više</a>
            </div>
        </div>
    </div>
</section>

<!-- Consultation CTA 
<section class="section" style="background-color: hsl(var(--primary) / 0.1); border-top: 1px solid hsl(var(--primary) / 0.2); border-bottom: 1px solid hsl(var(--primary) / 0.2);">
    <div class="container text-center">
        <div style="max-width: 48rem; margin: 0 auto;">
            <h2 class="section-title font-serif">Get a Free Consultation</h2>
            <p class="hero-description mb-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent pellentesque adipiscing cras nec orci lacinia amet, vulputate.</p>
            <div style="display: flex; flex-direction: column; gap: 1rem; justify-content: center; align-items: center;">
                <a href="#contact" class="btn btn-gold btn-xl">CONTACT ME</a>
                <a href="#case-results" class="btn btn-gold-outline btn-xl">CASE RESULTS</a>
            </div>
        </div>
    </div>
</section> -->

<!-- Contact Section -->
<section class="section contact-section" id="contact">
    <div class="container">
        <div class="contact-wrapper">
            <div class="contact-left">
                <div class="subtitle-wrapper contact">
                    <div class="accent"></div>
                    <div class="subtitle white">Kontakt</div>
                </div>
                <h2 class="title white contact">Javite se</h2>
                <p class="paragraph-large white contact">Bavimo se širokim spektrom pravnih pitanja. Kontaktirajte nas da razgovaramo o vašim specifičnim potrebama.</p>
                <div class="contact-directly-title">Radije biste stupili u direktan kontakt?</div>
                <a href="mailto:contact@lawyer.com" class="contact-directly-link">
                    <span class="contact-directly-icon">📧</span>
                    <span class="contact-directly-link-text">info@ahmedtomic.com</span>
                </a>
                <a href="tel:(212)587-0127" class="contact-directly-link last">
                    <span class="contact-directly-icon">📞</span>
                    <span class="contact-directly-link-text">064-411 53 01</span>
                </a>
            </div>
            <div class="contact-right">
                <div class="contact-form-card">
                    <?php echo do_shortcode('[contact_form]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Case Results 
<section class="section" id="case-results">
    <div class="container">
        <div class="section-header">
            <p class="section-badge">Case Results</p>
            <h2 class="section-title font-serif">Great past results for our clients</h2>
            <div class="pt-4">
                <a href="#" class="btn btn-gold-outline btn-lg">BROWSE CASE RESULTS</a>
            </div>
        </div>

        <div class="grid grid-2" style="max-width: 64rem; margin: 0 auto;">
            <div class="card">
                <div style="aspect-ratio: 16/9; background-color: hsl(var(--muted)); overflow: hidden;">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=300&fit=crop&crop=face" alt="Corporate & Compliance" style="width: 100%; height: 100%; object-fit: cover; transition: var(--transition-smooth);">
                </div>
                <div class="card-content">
                    <div style="font-size: 1.875rem; font-weight: bold; color: hsl(var(--primary)); margin-bottom: 1rem;" class="font-serif">$46,000,000</div>
                    <h3 style="font-size: 1.25rem; font-weight: 600; color: hsl(var(--foreground)); margin-bottom: 1rem;" class="font-serif">Corporate & Compliance</h3>
                    <p class="text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Purus gravida in ipsum in quis. Metus amet et risus platea.</p>
                    <a href="#" style="color: hsl(var(--primary)); font-weight: 600; text-decoration: none;">Read More →</a>
                </div>
            </div>

            <div class="card">
                <div style="aspect-ratio: 16/9; background-color: hsl(var(--muted)); overflow: hidden;">
                    <img src="https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=400&h=300&fit=crop&crop=center" alt="Company Acquisition" style="width: 100%; height: 100%; object-fit: cover; transition: var(--transition-smooth);">
                </div>
                <div class="card-content">
                    <div style="font-size: 1.875rem; font-weight: bold; color: hsl(var(--primary)); margin-bottom: 1rem;" class="font-serif">$12,000,000</div>
                    <h3 style="font-size: 1.25rem; font-weight: 600; color: hsl(var(--foreground)); margin-bottom: 1rem;" class="font-serif">Company Acquisition</h3>
                    <p class="text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Purus gravida in ipsum in quis. Metus amet et risus platea.</p>
                    <a href="#" style="color: hsl(var(--primary)); font-weight: 600; text-decoration: none;">Read More →</a>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- Testimonials 
<section class="section" style="background-color: hsl(var(--secondary));">
    <div class="container">
        <div class="section-header">
            <p class="section-badge">Testimonials</p>
            <h2 class="section-title font-serif">What Our Clients Say</h2>
        </div>

        <div class="grid grid-2">
            <div class="card">
                <div class="card-content">
                    <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/testimonial-client.jpg" alt="Client" style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover;">
                        <div>
                            <h4 class="font-semibold">Sarah Johnson</h4>
                            <p class="text-muted" style="font-size: 0.875rem;">Business Owner</p>
                        </div>
                    </div>
                    <p class="text-muted">"John Carter provided exceptional legal representation for my business. His expertise and dedication helped us achieve an outstanding result."</p>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                    <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/testimonial-client.jpg" alt="Client" style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover;">
                        <div>
                            <h4 class="font-semibold">Michael Brown</h4>
                            <p class="text-muted" style="font-size: 0.875rem;">Real Estate Developer</p>
                        </div>
                    </div>
                    <p class="text-muted">"Professional, knowledgeable, and results-driven. I highly recommend John Carter for any legal matters."</p>
                </div>
            </div>
        </div>
    </div>
</section> -->

<?php get_footer(); ?>