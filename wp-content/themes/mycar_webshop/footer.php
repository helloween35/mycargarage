
<?php
if (get_post_meta(get_the_ID(), 'has_footer', true) == 1) :
?>

<footer class="site-footer">
    <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1134.63 158.42"><g fill="%23fbd8c2"><path d="M1134.63 158.42H0L569.46 47.1Z"/><path d="M1134.63 158.42v-51.38L569.46 0 0 115.6v42.82Z" opacity=".66"/></g></svg>
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
