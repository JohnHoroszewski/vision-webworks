<?php
/**
 * Template part for displaying page content in clients-template.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package envision_web_media
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clients' ); ?>>
<?php $pBanner = get_field( 'top_banner_image' ); ?>
    <div class="page-banner" style="background-image:url('<?php echo $pBanner[ 'url' ]; ?>');">
        <div class="constrain">
            <div class="big-title big-title-white">Our Work</div>
        </div>
    </div>
    
    <section class="page-intro p50">
        <div class="constrain">
            <div class="intro-block flexxed">
                <h1>
                    <?php the_field( 'intro_title' ); ?>
                </h1>
                <div class="intro-text">
                    <?php the_field( 'intro_text' ); ?>
                </div>
            </div>
        </div><!-- .constrain -->
    </section><!-- .page-intro -->

    <section class="clients-list p50">
        <div class="constrain">


            <div class="flexxed">
                <?php query_posts( array( 'post_type' => 'client', 'showposts' => -1, 'order' => 'ASC' ) ); ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="recent-work-item">
                        <?php the_post_thumbnail(); ?>
                        <div class="overlay">
                            <div class="client-info-container">
                                <h4><?php the_title(); ?></h4>
                                <div class="project-info">
                                    <?php the_field( 'project_type' ); ?>
                                </div>
                                <div class="client-sector">
                                    <?php the_field( 'client_sector' ); ?>
                                </div>
                                <a class="btn-auto accent-bg view-project" href="<?php the_permalink(); ?>">Read More</a>
                                </div>
                        </div><!-- .overlay -->
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_query(); ?>
            </div>

            <!-- <?php
                query_posts( array( 'post_type' => 'client', 'orderby' => 'menu_order', 'showposts' => -1 ) ); ?>
                <?php while ( have_posts() ) : the_post(); ?>

                    <div class="client-item flexxed">
                        <div class="client-content-container">
                            <div class="client-content">
                                <h2><?php the_title(); ?></h2>
                                <p>
                                    <div class="client-detail"><?php the_field( 'project_type' ); ?></div>
                                    <div class="client-detail"><?php the_field( 'platform' ); ?></div>
                                    <div class="client-detail"><strong><?php the_field( 'client_sector' ); ?></strong></div>
                                </p>
                                <a class="btn-lg accent-bg" href="<?php the_permalink(); ?>">View Project</a>
                            </div>
                        </div>
                        <div class="client-image">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    </div>

                <?php endwhile; ?>
            <?php wp_reset_query(); ?> -->
        </div><!-- .constrain -->
    </section><!-- .services-list -->
</article><!-- #post-<?php the_ID(); ?> -->

<?php ewm_cta_module(); ?>
