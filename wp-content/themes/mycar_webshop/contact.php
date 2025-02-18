<?php
/**
 * Template Name: Kapcsolat Oldal
 * Description: Egyedi sablon a kapcsolat oldalhoz.
 */
get_header(); ?>

<div class="container contact-page">
    <img class="background" src="<?php echo get_template_directory_uri(); ?>/assets/img/slider-bg-4.svg" alt="" />

    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
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

                <form action="/kapcsolat/#wpcf7-f6-o1" method="post" class="wpcf7-form init" aria-label="Kapcsolatfelvételi űrlap" novalidate="novalidate" data-status="init">
                    <input type="hidden" name="_wpcf7" value="6">
                    <input type="hidden" name="_wpcf7_version" value="6.0.3">
                    <input type="hidden" name="_wpcf7_locale" value="hu_HU">
                    <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f6-o1">
                    <input type="hidden" name="_wpcf7_container_post" value="0">
                    <input type="hidden" name="_wpcf7_posted_data_hash" value="">
                
                    <div class="mb-4">
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

                    <div class="mb-4">
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

                    <div class="mb-4">
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

                    <div class="mb-4">
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
                        <input class="wpcf7-form-control wpcf7-submit has-spinner" type="submit" value="Beküldés">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
</div>

<?php get_footer(); ?>
