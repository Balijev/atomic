    </main>

    <footer class="site-footer">
        <div class="container">
            <?php if (is_active_sidebar('footer-1')) : ?>
                <div class="footer-widgets" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 2rem; margin-bottom: 3rem;">
                    <?php dynamic_sidebar('footer-1'); ?>
                </div>
            <?php endif; ?>

            <div class="footer-content">
                <div>
                    <h3 class="font-serif font-bold mb-4" style="color: hsl(var(--primary)); font-size: 1.5rem;">Ahmed Tomić</h3>
                    <p class="text-muted mb-4">Profesionalne pravne usluge sa dokazanim uspjehom.</p>
                    <div style="display: flex; gap: 1rem;">
                        <a href="#" style="color: hsl(var(--muted-foreground)); transition: var(--transition-smooth);">Facebook</a>
                        <a href="https://www.linkedin.com/in/ahmed-tomic-a5891715a/" style="color: hsl(var(--muted-foreground)); transition: var(--transition-smooth);">LinkedIn</a>
                        <a href="#" style="color: hsl(var(--muted-foreground)); transition: var(--transition-smooth);">X</a>
                    </div>
                </div>

                <div>
                    <h4 class="font-semibold mb-4">Područja prakse</h4>
                    <ul style="list-style: none; padding: 0;">
                        <li style="margin-bottom: 0.5rem;"><a href="#" class="text-muted" style="text-decoration: none; transition: var(--transition-smooth);">Nasledno Pravo</a></li>
                        <li style="margin-bottom: 0.5rem;"><a href="#" class="text-muted" style="text-decoration: none; transition: var(--transition-smooth);">Lična povreda</a></li>
                        <li style="margin-bottom: 0.5rem;"><a href="#" class="text-muted" style="text-decoration: none; transition: var(--transition-smooth);">Privredno pravo</a></li>
                        <li style="margin-bottom: 0.5rem;"><a href="#" class="text-muted" style="text-decoration: none; transition: var(--transition-smooth);">Porodični zakon</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold mb-4">Kontakt informacije</h4>
                    <div style="color: hsl(var(--muted-foreground));">
                        <p style="margin-bottom: 0.5rem;">📍 Maršala Tita 145, Tuzla Grad 75000</p>
                        <p style="margin-bottom: 0.5rem;">📞 064/4115301</p>
                        <p style="margin-bottom: 0.5rem;">✉️ info@ahmedtomic.com</p>
                    </div>
                </div>

                <div>
                    <h4 class="font-semibold mb-4">Radno vrijeme</h4>
                    <div style="color: hsl(var(--muted-foreground));">
                        <p style="margin-bottom: 0.5rem;">Ponedjeljak - Petak: 9:00 - 16:00</p>
            <!--       <p style="margin-bottom: 0.5rem;">Saturday: 10:00 AM - 4:00 PM</p> -->
                        <p style="margin-bottom: 0.5rem;">Nedjelja: zatvoreno</p>
                        <p style="margin-bottom: 0.5rem; color: hsl(var(--primary));">Hitna linija dostupna 24/7</p>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> Lehoia. All rights reserved. | <a href="#" style="color: hsl(var(--primary)); text-decoration: none;">Privacy Policy</a> | <a href="#" style="color: hsl(var(--primary)); text-decoration: none;">Terms of Service</a></p>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
    </body>

    </html>