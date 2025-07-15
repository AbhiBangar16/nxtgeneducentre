<footer class="footer">
    <div class="footer-content">
        <div class="footer-col">
            <h4><?php echo get_theme_mod('footer_contact_title', 'Contact Info'); ?></h4>
            <p><strong>Email:</strong> <?php echo get_theme_mod('footer_email', 'nxtgen.educentre@gmail.com'); ?></p>
            <p><strong>Mob:</strong> <?php echo get_theme_mod('footer_phone', '93161-30112'); ?></p>
        </div>
        <div class="footer-col">
            <h4><?php echo get_theme_mod('footer_legal_title', 'Legal'); ?></h4>
            <p>Copyright © <?php echo get_theme_mod('footer_copyright', 'NXT GEN EDU CENTRE'); ?></p>
            <p><?php echo get_theme_mod('footer_rights', 'All Rights Reserved.'); ?></p>
            <p><?php echo get_theme_mod('footer_visitor', 'You are visitor No.'); ?></p>
            <a href="<?php echo get_theme_mod('footer_designer_url', 'http://sign-x.in/'); ?>" target="_blank"><?php echo get_theme_mod('footer_designer', 'Designed by Sign-X'); ?></a>
        </div>
        <div class="footer-col">
            <h4><?php echo get_theme_mod('footer_courses_title', 'Courses'); ?></h4>
            <p><?php echo get_theme_mod('footer_courses_text', 'We have a great set of courses for you to choose from to help further your education.'); ?></p>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php echo get_theme_mod('footer_bottom_text', 'All rights reserved.'); ?>
    </div>
</footer>

<script>
// Scroll animation observer
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        }
    });
}, observerOptions);

// Observe all scroll-animate elements
document.querySelectorAll('.scroll-animate').forEach(el => {
    observer.observe(el);
});

// Add hover effects to navigation
document.querySelectorAll('.nav-links a').forEach(link => {
    link.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-2px) scale(1.05)';
    });
    
    link.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0) scale(1)';
    });
});

// Add parallax effect to floating shapes
window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const shapes = document.querySelectorAll('.floating-shape');
    
    shapes.forEach((shape, index) => {
        const speed = 0.5 + (index * 0.1);
        shape.style.transform = `translateY(${scrolled * speed}px) rotate(${scrolled * 0.1}deg)`;
    });
});

// Add smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Enhanced search functionality
document.querySelector('.search-bar input')?.addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const navLinks = document.querySelectorAll('.nav-links a');
    
    navLinks.forEach(link => {
        const linkText = link.textContent.toLowerCase();
        if (linkText.includes(searchTerm) && searchTerm.length > 0) {
            link.style.background = 'rgba(45, 108, 223, 0.2)';
            link.style.transform = 'scale(1.05)';
        } else {
            link.style.background = '';
            link.style.transform = '';
        }
    });
});

// Enhanced form interactions
document.querySelectorAll('.contact-form input, .contact-form textarea').forEach(input => {
    input.addEventListener('focus', function() {
        this.parentElement.style.transform = 'scale(1.02)';
    });
    
    input.addEventListener('blur', function() {
        this.parentElement.style.transform = 'scale(1)';
    });
});

// Form submission animation
document.querySelector('.contact-form')?.addEventListener('submit', function(e) {
    e.preventDefault();
    const button = this.querySelector('button');
    button.textContent = 'Sending...';
    button.style.background = 'var(--accent)';
    
    setTimeout(() => {
        button.textContent = 'Message Sent!';
        button.style.background = '#28a745';
        setTimeout(() => {
            button.textContent = 'Send Message';
            button.style.background = 'var(--primary)';
        }, 2000);
    }, 1500);
});
</script>

<?php wp_footer(); ?>
</body>
</html> 