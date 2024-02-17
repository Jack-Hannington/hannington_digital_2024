
</div>
<footer id="colophon" class="site-footer">
 <div class="pt">
            <div class="container footer-links">
                <div class="row ">
                    <div class="col-12 d-flex justify-content-start">
                    <?php
        if (function_exists('the_custom_logo')) {
            the_custom_logo();
        }
        ?> 
                    </div>
                    <div class="col-12 d-flex justify-content-start"> 
            <?php wp_nav_menu(array(
            'theme_location' => 'footer-menu',
            'menu_class' => 'footer-menu',
            'fallback_cb' => false
        )); ?>
                    </div>  
                   <p class="mt-3"> &copy <?php echo date('Y'); ?> Hannington Digital</p>
            </div>
    </div>
        </div>
    </footer>

    <?php wp_footer(); ?>

</body>
</html>
