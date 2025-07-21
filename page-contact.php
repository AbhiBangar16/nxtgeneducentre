<?php
/**
 * Template Name: Contact Page
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
        <h1><?php echo get_theme_mod('contact_hero_title', 'Contact Us'); ?></h1>
        <p><?php echo get_theme_mod('contact_hero_subtitle', 'We\'d love to hear from you! Reach out with your questions, feedback, or inquiries using the form below or our contact details.'); ?></p>
    </div>
</section>

<main class="main-content">
    <!-- Contact Details Section -->
    <section class="contact-details-section scroll-animate" style="width: 100%; background: var(--card-bg); border-radius: 18px; box-shadow: var(--shadow); padding: 2rem; margin-bottom: 2rem; text-align: center;">
        <h2 style="color: var(--accent); font-family: 'Montserrat', serif; font-size: 2rem; margin-bottom: 1.5rem;"><?php echo get_theme_mod('contact_details_title', 'Contact Information'); ?></h2>
        <div style="display: flex; flex-wrap: wrap; justify-content: space-around; gap: 2rem; max-width: 800px; margin: 0 auto;">
            <div style="flex: 1; min-width: 200px;">
                <h3 style="color: var(--primary); font-family: 'Montserrat', serif; font-size: 1.2rem; margin-bottom: 0.5rem;">📍 Address</h3>
                <p style="font-size: 1.1rem; line-height: 1.6;"><?php echo get_theme_mod('contact_address', 'Nxt Gen EduCentre<br>Punjab, India'); ?></p>
            </div>
            <div style="flex: 1; min-width: 200px;">
                <h3 style="color: var(--primary); font-family: 'Montserrat', serif; font-size: 1.2rem; margin-bottom: 0.5rem;">📞 Phone</h3>
                <p style="font-size: 1.1rem; line-height: 1.6;"><a href="tel:<?php echo get_theme_mod('contact_phone', '+919316130112'); ?>" style="color: var(--text); text-decoration: none; transition: color 0.3s;"><?php echo get_theme_mod('contact_phone', '+91 93161-30112'); ?></a></p>
            </div>
            <div style="flex: 1; min-width: 200px;">
                <h3 style="color: var(--primary); font-family: 'Montserrat', serif; font-size: 1.2rem; margin-bottom: 0.5rem;">✉️ Email</h3>
                <p style="font-size: 1.1rem; line-height: 1.6;"><a href="mailto:<?php echo get_theme_mod('contact_email', 'nxtgen.educentre@gmail.com'); ?>" style="color: var(--text); text-decoration: none; transition: color 0.3s;"><?php echo get_theme_mod('contact_email', 'nxtgen.educentre@gmail.com'); ?></a></p>
            </div>
        </div>
    </section>

    <!-- Original Contact Form Section -->
    <div style="display: flex; flex-wrap: wrap; gap: 2rem;">
        <section class="contact-section scroll-animate">
            <h2><?php echo get_theme_mod('contact_form_title', 'Get in Touch'); ?></h2>
            <?php
            // Check if Contact Form 7 is active
            if (function_exists('wpcf7_contact_form')) {
                echo do_shortcode('[contact-form-7 id="1" title="Contact form 1"]');
            } else {
                // Fallback contact form
            ?>
                <form class="contact-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                    <input type="hidden" name="action" value="nxtgen_contact_form">
                    <?php wp_nonce_field('nxtgen_contact_nonce', 'contact_nonce'); ?>
                    
                    <input type="text" name="name" placeholder="Your Name" required>
                    <input type="email" name="email" placeholder="Your Email" required>
                    <textarea name="message" placeholder="Your Message" required></textarea>
                    <button type="submit">Send Message</button>
                </form>
            <?php } ?>
        </section>
        
        <aside class="sidebar-section scroll-animate">
            <h3><?php echo get_theme_mod('contact_sidebar_title', 'Quick Links'); ?></h3>
            <div class="sidebar-links">
                <a class="sidebar-link" href="<?php echo home_url('/'); ?>">Home</a>
                <a class="sidebar-link" href="<?php echo get_permalink(get_page_by_path('courses')); ?>">Courses</a>
                <a class="sidebar-link" href="<?php echo get_permalink(get_page_by_path('downloads')); ?>">Downloads</a>
            </div>
        </aside>
    </div>
</main>

<?php get_footer(); ?> 