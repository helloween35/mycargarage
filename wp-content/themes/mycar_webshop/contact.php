<?php
/**
 * Template Name: Kapcsolat Oldal
 * Description: Egyedi sablon a kapcsolat oldalhoz.
 */
get_header(); ?>

<div class="container-fluid">
    <img class="background" src="<?php echo get_template_directory_uri(); ?>/assets/img/slider-bg-4.svg" alt="" />

    <div class="row">
        <div class="col-12 col-md-6 order-2 order-md-1">
            <h2>Üzenj nekünk</h2>

            <p>
                Ha kérdésed van, írd meg nekünk, kollégáink 1-2 munkanapon belül válaszolni fognak.
            </p>

            <div class="wpcf7 js" id="wpcf7-f6-o1" lang="hu-HU" dir="ltr" data-wpcf7-id="6">
                <div class="wpcf7-response-output" aria-hidden="true"></div>

                <div class="screen-reader-response">
                    <p role="status" aria-live="polite" aria-atomic="true"></p>
                    <ul></ul>
                </div>

                <form action="/kapcsolat/#wpcf7-f6-o1" method="post" class="wpcf7-form init form-green" aria-label="Kapcsolatfelvételi űrlap" novalidate="novalidate" data-status="init">
                    <input type="hidden" name="_wpcf7" value="6">
                    <input type="hidden" name="_wpcf7_version" value="6.0.3">
                    <input type="hidden" name="_wpcf7_locale" value="hu_HU">
                    <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f6-o1">
                    <input type="hidden" name="_wpcf7_container_post" value="0">
                    <input type="hidden" name="_wpcf7_posted_data_hash" value="">
                
                    <div class="form-group">
                        <label> Név: * </label>
                        <input
                            class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                            autocomplete="name"
                            aria-required="true"
                            aria-invalid="false"
                            value=""
                            type="text"
                            name="your-name"
                            autofocus
                        />
                        <span class="wpcf7-form-control-wrap" data-name="your-name"></span>
                    </div>

                    <div class="form-group">
                        <label> E-mail cím: * </label>
                        <input 
                            class="wpcf7-form-control wpcf7-email wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-email"
                            autocomplete="email"
                            aria-required="true"
                            aria-invalid="false"
                            value=""
                            type="email"
                            name="your-email"
                        />
                        <span class="wpcf7-form-control-wrap" data-name="your-email"></span>
                    </div>

                    <div class="form-group">
                        <label> Tárgy: * </label>
                        <input
                            class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                            aria-required="true"
                            aria-invalid="false"
                            value=""
                            type="text"
                            name="your-subject"
                        />
                        <span class="wpcf7-form-control-wrap" data-name="your-subject"></span>
                    </div>

                    <div class="form-group">
                        <label> Üzenet: * </label>
                        <textarea 
                            class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required"
                            rows="10"
                            aria-required="true"
                            aria-invalid="false"
                            name="your-message"
                        ></textarea>
                        <span class="wpcf7-form-control-wrap" data-name="your-message"></span>
                    </div>

                    <div class="d-flex justify-content-end submit-group">
                        <button class="wpcf7-form-control wpcf7-submit has-spinner cta cta-primary" type="submit">Beküldés</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-md-6 order-1 order-md-2">
            <div class="contact-info">
                <div class="contact-info__container">
                    <h2>Üzenj nekünk</h2>

                    <p>
                        Ha kérdésed van, írd meg nekünk, kollégáink 1-2 munkanapon belül válaszolni fognak.
                    </p>
                    <ul>
                        <li>
                            <i class="fa fa-phone"></i> <a href="tel:06303232423">06 30 323 24 23</a> 
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i> <a href="mailto:probaemail@gmail.com">probaemail@gmail.com</a>
                        </li>
                        <li>
                            <i class="fas fa-map-marker-alt"></i> 3634. Bla bla Izé út 666
                        </li>
                    </ul>

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2660.5231627306744!2d20.73564697681698!3d48.17727074839645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473f6166bafeed3f%3A0x500a56b82cddb35c!2zU2Fqw7Niw6Fib255LCBFcnpzw6liZXQgS2lyw6FseW7DqSDDunQgNywgMzc5Mg!5e0!3m2!1shu!2shu!4v1740818270897!5m2!1shu!2shu" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
