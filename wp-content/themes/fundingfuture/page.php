<?php get_header(); ?>
    <div class="default-page-container">
        <section class="hero-section">
            <div class="content-wrap">
                <h1><?php the_title() ?></h1>
            </div>
        </section>

        <section class="editor-section">
            <div class="content-wrap">
                <div class="section-content">
                    <div class="text-editor">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php get_footer(); ?>