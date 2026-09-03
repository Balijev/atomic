/**
 * Lehoia Theme JavaScript
 */

(function($) {
    'use strict';

    // Document ready
    $(document).ready(function() {
        // Smooth scrolling for anchor links
        $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').click(function(event) {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
                && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top - 80
                    }, 1000, function() {
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) {
                            return false;
                        } else {
                            $target.attr('tabindex','-1');
                            $target.focus();
                        };
                    });
                }
            }
        });

        // Mobile menu toggle
        $('.mobile-menu-toggle').click(function() {
            $('.nav-menu').toggleClass('active');
            $(this).toggleClass('active');
        });

        // Header scroll effect
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            if (scroll >= 50) {
                $('.site-header').addClass('scrolled');
            } else {
                $('.site-header').removeClass('scrolled');
            }
        });

        // Animate elements on scroll
        function animateOnScroll() {
            $('.animate-on-scroll').each(function() {
                var elementTop = $(this).offset().top;
                var elementBottom = elementTop + $(this).outerHeight();
                var viewportTop = $(window).scrollTop();
                var viewportBottom = viewportTop + $(window).height();

                if (elementBottom > viewportTop && elementTop < viewportBottom) {
                    $(this).addClass('animated');
                }
            });
        }

        // Run animation on scroll
        $(window).scroll(animateOnScroll);
        animateOnScroll(); // Run once on load

        // Contact form handling
        $('#contact-form').submit(function(e) {
            e.preventDefault();
            
            var form = $(this);
            var formData = form.serialize();
            
            // Add loading state
            form.find('button[type="submit"]').prop('disabled', true).text('Sending...');
            
            $.ajax({
                type: 'POST',
                url: form.attr('action'),
                data: formData,
                success: function(response) {
                    // Show success message
                    form[0].reset();
                    showNotification('Message sent successfully!', 'success');
                },
                error: function() {
                    showNotification('Error sending message. Please try again.', 'error');
                },
                complete: function() {
                    form.find('button[type="submit"]').prop('disabled', false).text('Send Message');
                }
            });
        });

        // Notification system
        function showNotification(message, type) {
            var notification = $('<div class="notification notification-' + type + '">' + message + '</div>');
            $('body').append(notification);
            
            setTimeout(function() {
                notification.addClass('show');
            }, 100);
            
            setTimeout(function() {
                notification.removeClass('show');
                setTimeout(function() {
                    notification.remove();
                }, 300);
            }, 3000);
        }

        // Testimonials slider (if multiple testimonials)
        if ($('.testimonials-slider').length) {
            $('.testimonials-slider').slick({
                dots: true,
                infinite: true,
                speed: 500,
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 5000,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        }

        // Case results filter (if implemented)
        $('.case-filter button').click(function() {
            var filter = $(this).data('filter');
            
            $('.case-filter button').removeClass('active');
            $(this).addClass('active');
            
            if (filter === 'all') {
                $('.case-item').fadeIn();
            } else {
                $('.case-item').hide();
                $('.case-item[data-category="' + filter + '"]').fadeIn();
            }
        });

        // Lazy loading for images
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }

        // Back to top button
        $(window).scroll(function() {
            if ($(this).scrollTop() > 500) {
                $('.back-to-top').fadeIn();
            } else {
                $('.back-to-top').fadeOut();
            }
        });

        $('.back-to-top').click(function() {
            $('html, body').animate({scrollTop: 0}, 800);
            return false;
        });

        // Stats counter animation
        function animateStats() {
            $('.stat-number').each(function() {
                var $this = $(this);
                var countTo = $this.attr('data-count');
                
                $({ countNum: $this.text()}).animate({
                    countNum: countTo
                }, {
                    duration: 2000,
                    easing: 'linear',
                    step: function() {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function() {
                        $this.text(this.countNum);
                    }
                });
            });
        }

        // Trigger stats animation when in view
        var statsAnimated = false;
        $(window).scroll(function() {
            var statsSection = $('.stats-section');
            if (statsSection.length && !statsAnimated) {
                var statsTop = statsSection.offset().top;
                var windowBottom = $(window).scrollTop() + $(window).height();
                
                if (windowBottom > statsTop) {
                    animateStats();
                    statsAnimated = true;
                }
            }
        });
    });

    // Window load
    $(window).on('load', function() {
        // Hide loading screen if present
        $('.loading-screen').fadeOut();
        
        // Initialize AOS (Animate On Scroll) if included
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 1000,
                easing: 'ease-in-out',
                once: true
            });
        }
    });

})(jQuery);