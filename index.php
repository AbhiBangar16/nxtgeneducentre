<?php get_header(); ?>

<!-- Floating background shapes -->
<div class="floating-shapes">
    <div class="floating-shape"></div>
    <div class="floating-shape"></div>
    <div class="floating-shape"></div>
    <div class="floating-shape"></div>
</div>

<section class="hero">
    <div class="hero-content">
        <h1><?php echo get_theme_mod('hero_title', 'Welcome to Nxt Gen EduCentre'); ?></h1>
        <p><?php echo get_theme_mod('hero_subtitle', ''); ?></p>
    </div>
</section>

<main class="main-content">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <!-- Default homepage content if no posts -->
        <section class="features-section">
            <div class="feature-card scroll-animate">
                <h3><?php echo get_theme_mod('feature_1_title', 'Quality Education'); ?></h3>
                <p><?php echo get_theme_mod('feature_1_text', 'We provide top-notch educational content and resources designed to help students excel in their academic journey.'); ?></p>
            </div>
            <div class="feature-card scroll-animate">
                <h3><?php echo get_theme_mod('feature_2_title', 'Expert Guidance'); ?></h3>
                <p><?php echo get_theme_mod('feature_2_text', 'Our experienced educators and mentors are here to support you every step of the way towards your educational goals.'); ?></p>
            </div>
            <div class="feature-card scroll-animate">
                <h3><?php echo get_theme_mod('feature_3_title', 'Modern Learning'); ?></h3>
                <p><?php echo get_theme_mod('feature_3_text', 'Stay ahead with our cutting-edge learning materials and innovative teaching methodologies.'); ?></p>
            </div>
        </section>

        <section class="cta-section scroll-animate">
            <h2><?php echo get_theme_mod('cta_title', 'Ready to Start Your Journey?'); ?></h2>
            <p><?php echo get_theme_mod('cta_text', 'Explore our courses and take the first step towards achieving your educational dreams.'); ?></p>
            <a href="<?php echo get_permalink(get_page_by_path('courses')); ?>" class="cta-button"><?php echo get_theme_mod('cta_button_text', 'Explore Courses'); ?></a>
        </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?> 