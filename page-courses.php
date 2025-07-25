<?php
/**
 * Template Name: Courses Page
 */

get_header(); ?>

<!-- Floating background shapes -->
<div class="floating-shapes">
    <div class="floating-shape"></div>
    <div class="floating-shape"></div>
    <div class="floating-shape"></div>
    <div class="floating-shape"></div>
</div>

<section class="hero">
    <div class="hero-content">
        <h1><?php echo get_theme_mod('courses_hero_title', 'Our Courses'); ?></h1>
        <p><?php echo get_theme_mod('courses_hero_subtitle', 'Discover our comprehensive range of educational courses designed to help you achieve your academic goals.'); ?></p>
    </div>
</section>

<main class="main-content">
    <div class="courses-grid">
        <?php
        $courses_query = new WP_Query(array(
            'post_type' => 'courses',
            'posts_per_page' => -1,
            'post_status' => 'publish'
        ));

        if ($courses_query->have_posts()) :
            while ($courses_query->have_posts()) : $courses_query->the_post();
        ?>
            <div class="course-card scroll-animate">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="course-image">
                        <?php the_post_thumbnail('medium'); ?>
                    </div>
                <?php endif; ?>
                <h3><?php the_title(); ?></h3>
                <p><?php echo get_the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>" class="cta-button">Learn More</a>
            </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
            // Course cards will be added here
        ?>
        <?php endif; ?>
    </div>

    <section class="cta-section scroll-animate">
        <h2><?php echo get_theme_mod('courses_cta_title', 'Ready to Enroll?'); ?></h2>
        <p><?php echo get_theme_mod('courses_cta_text', 'Contact us to learn more about our courses and enrollment process.'); ?></p>
        <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="cta-button"><?php echo get_theme_mod('courses_cta_button', 'Contact Us'); ?></a>
    </section>
</main>

<?php get_footer(); ?> 