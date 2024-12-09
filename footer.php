<?php
/**
 * The footer template
 */

if (!modern_full_width_render_footer()):
    // Default footer if no builder footer is enabled
?>
    <footer class="site-footer">
        <div class="footer-content">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
        </div>
    </footer>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>