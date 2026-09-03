<aside id="secondary" class="sidebar widget-area" role="complementary">
    <?php if (is_active_sidebar('sidebar-1')) : ?>
        <?php dynamic_sidebar('sidebar-1'); ?>
    <?php else : ?>
        <section class="widget widget_text">
            <h2 class="widget-title"><?php esc_html_e('Sidebar', 'lehoia'); ?></h2>
            <p><?php esc_html_e('Add widgets here to appear in the sidebar.', 'lehoia'); ?></p>
        </section>
    <?php endif; ?>
</aside>