
<?php
if (get_post_meta(get_the_ID(), 'has_footer', true) == 1) :
?>

<footer class="site-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="footer-menu">
                    <h4>Hasznos linkek</h4>
                    <?php 
                        wp_nav_menu(array(
                            'menu' => 'Footer menu mandatory'
                        ));
                    ?>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="footer-menu"> 
                    <h4>Hasznos linkek</h4>
                    <?php 
                        wp_nav_menu(array(
                            'menu' => 'Footer menu useful'
                        ));
                    ?>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="footer-menu">
                    <h4>Social</h4>
                    
                    <ul>
                        <li>
                            <a href="">
                                <i class="fa-brands fa-facebook"></i> Facebook
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa-brands fa-instagram"></i> Instagram
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php
endif;
?>

<div class="footer-bottom">
    <div class="container-fluid">
        <div class="row">
            <!-- Lábfej bal oldali rész -->
            <div class="col-md-6">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Minden jog fenntartva.</p>
            </div>
            <!-- Lábfej jobb oldali rész, pl. közösségi média linkek -->
            <div class="col-md-6 text-md-end">
                <p class="mb-0">
                    Designed by <a href="https://webfusion.hu" class="text-decoration-none" target="_blank">WebFusion</a>
                </p>
            </div>
        </div>
    </div>
    <?php wp_footer(); ?>
</div>


</body>
</html> 
