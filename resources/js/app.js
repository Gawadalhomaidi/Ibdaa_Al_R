// Import Chart.js
import Chart from 'chart.js/auto';
import Alpine from 'alpinejs'

window.Alpine = Alpine

Alpine.start()

window.ERP = {
 
    initSmoothScroll() {
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
    },
 
    initScrollAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in, .slide-in-left, .slide-in-right').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'all 0.6s ease-out';
            observer.observe(el);
        });
    },

    initProgressBars() {
        document.querySelectorAll('.progress-bar').forEach(bar => {
            const width = bar.style.width;
            bar.style.width = '0%';
            setTimeout(() => {
                bar.style.width = width;
            }, 500);
        });
    },

    init() {
        this.initSmoothScroll();
        this.initScrollAnimations();
        this.initProgressBars();
    }
};

document.addEventListener('DOMContentLoaded', function() {
    window.ERP.init();
});

    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('nav-scrolled');
        } else {
            navbar.classList.remove('nav-scrolled');
        }
    });

    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in-up');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.modern-card, .fade-in-up').forEach(el => {
        observer.observe(el);
    });
    const themeToggle = document.getElementById('theme-toggle');
    const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');
    
    const currentTheme = localStorage.getItem('theme') || 
                        (prefersDarkScheme.matches ? 'dark' : 'light');
    
    if (currentTheme === 'dark') {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
    
    themeToggle.addEventListener('click', function() {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
    });
    
    prefersDarkScheme.addEventListener('change', (e) => {
        if (!localStorage.getItem('theme')) {
            if (e.matches) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        }
    }); 

document.addEventListener('DOMContentLoaded', function() {
    const scrollWrapper = document.querySelector('.modules-scroll-wrapper');
    const prevBtn = document.querySelector('.module-nav-prev');
    const nextBtn = document.querySelector('.module-nav-next');
    const indicators = document.querySelectorAll('.module-indicator');
    
    if (scrollWrapper && prevBtn && nextBtn) {
        const cardWidth = 320; 
        const scrollAmount = cardWidth * 2;
        
        nextBtn.addEventListener('click', function() {
            scrollWrapper.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            });
        });
        
        prevBtn.addEventListener('click', function() {
            scrollWrapper.scrollBy({
                left: -scrollAmount,
                behavior: 'smooth'
            });
        });
        
        scrollWrapper.addEventListener('scroll', function() {
            updateActiveIndicator();
        });
        
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', function() {
                const targetPosition = index * cardWidth;
                scrollWrapper.scrollTo({
                    left: targetPosition,
                    behavior: 'smooth'
                });
            });
        });

        function updateActiveIndicator() {
            const scrollPosition = scrollWrapper.scrollLeft;
            const activeIndex = Math.round(scrollPosition / cardWidth);
            
            indicators.forEach((indicator, index) => {
                if (index === activeIndex) {
                    indicator.classList.add('active');
                } else {
                    indicator.classList.remove('active');
                }
            });
        }
        
        updateActiveIndicator();
    }
});
 
document.querySelectorAll('.progress-bar').forEach(bar => {
    const progress = bar.getAttribute('data-progress');
    bar.style.setProperty('--progress-width', progress + '%');
});

 
document.addEventListener('DOMContentLoaded', function() {
 
    if (typeof Alpine === 'undefined') {
        console.warn('Alpine.js is not loaded. Some animations may not work.');
    }

 
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    }, observerOptions);
 
    document.querySelectorAll('[x-init]').forEach(el => {
        observer.observe(el);
    });
});

document.addEventListener('DOMContentLoaded', function() {
    
    const fadeElements = document.querySelectorAll('.fade-in-up');
    
    const fadeInOnScroll = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('loaded');
            }
        });
    }, { threshold: 0.1 });

    fadeElements.forEach(el => fadeInOnScroll.observe(el));
    
    const cards = document.querySelectorAll('.media-interactive-card');
    
    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-8px)';
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0)';
        });
    });
});
 
function initPartners() {
    const partners = document.querySelectorAll('.partner-item');
    const radius = window.innerWidth < 768 ? 120 : 180;
    
    partners.forEach((partner, index) => {
        const angle = index * 45;
        partner.style.transform = `translate(-50%, -50%) rotate(${angle}deg) translateY(-${radius}px) rotate(-${angle}deg)`;
    });
}
 
window.addEventListener('load', initPartners);
window.addEventListener('resize', initPartners);

function initValuesCircle() {
    const circleItems = document.querySelectorAll('.value-circle-item');
    const radius = window.innerWidth < 768 ? 120 : 160;
    
    circleItems.forEach((item, index) => {
        const angle = index * 90; 
        item.style.transform = `translate(-50%, -50%) rotate(${angle}deg) translateY(-${radius}px) rotate(-${angle}deg)`;
    });
}
 
window.addEventListener('load', initValuesCircle);
window.addEventListener('resize', initValuesCircle);
 
document.querySelectorAll('.value-circle-item').forEach(item => {
    item.addEventListener('mouseenter', function() {
        this.style.zIndex = '50';
    });
    
    item.addEventListener('mouseleave', function() {
        this.style.zIndex = '10';
    });
}); 

let lastScrollY = window.scrollY;

header.classList.add('nav-scroll', 'nav-visible');
const header = document.querySelector('.nav-blur');

const handleScroll = () => {
    if (window.scrollY > 50) {
        header.classList.add('nav-scrolled');
    } else {
        header.classList.remove('nav-scrolled');
    }
};




window.addEventListener('scroll', handleScroll, { passive: true });


if (window.scrollY > 50) {
    header.classList.add('nav-scrolled');
}

export default window.ERP;

