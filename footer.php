</div>
<footer id="colophon" class="site-footer altius-dark-grey-bg ">
        <div class="container-fluid">
            <div class="container">
                <!-- Footer content goes here -->
                <div class="row py-5">
                    <div class="col-lg-3 col-md-6 col-12">
                    <?php
        if (function_exists('the_custom_logo')) {
            the_custom_logo();
        }
        ?> 
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <p class="footer-header">Services</p>
                    <?php wp_nav_menu(array(
            'theme_location' => 'services-menu',
            'menu_class' => 'footer-menu',
            'fallback_cb' => false
        )); ?>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <p class="footer-header">Clinics</p>
                        <?php wp_nav_menu(array(
            'theme_location' => 'clinic-menu',
            'menu_class' => 'footer-menu',
            'fallback_cb' => false
        )); ?>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <p class="footer-header">Company</p>
                        <p>About</p>
                        <p>Contact</p>
                        <p>Wellness</p>
                        <p>Corporate</p>
                        <p>Retreats</p>
                        <p>Team</p>
                        <p>Blog</p>
                </div>
            </div>
           
    </div>
    <div class="row border-top">
    <div class="col-12 container py-4">
                        &copy <?php echo date('Y'); ?> Altius Healthcare
                    </div>
    </div>
        </div>
    </footer><!-- #colophon -->

    <?php wp_footer(); ?>

</body>
</html>
