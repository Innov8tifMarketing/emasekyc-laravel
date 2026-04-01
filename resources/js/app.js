import './bootstrap';

import Alpine from 'alpinejs';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import 'virtual:instruckt';

gsap.registerPlugin(ScrollTrigger);

window.Alpine = Alpine;
window.gsap = gsap;
Alpine.start();

// ===== Reduced Motion Guard =====
const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

// Vite loads scripts as type="module" (deferred), so DOMContentLoaded
// may have already fired by the time this runs. Handle both cases.
function onReady(fn) {
    if (document.readyState !== 'loading') {
        fn();
    } else {
        document.addEventListener('DOMContentLoaded', fn);
    }
}

// ===== Reveal fallback if GSAP errors after hiding elements =====
const gsapAnimatedSelectors = '[data-gsap="fade-up"], .gsap-hero-phone, .gsap-scale-in';
function revealAll() {
    document.querySelectorAll(gsapAnimatedSelectors).forEach(el => {
        el.style.opacity = '1';
        el.style.transform = 'none';
    });
}

if (!prefersReducedMotion) {
    try {
        gsap.set('[data-gsap="fade-up"]', { opacity: 0, y: 24 });
        gsap.set('.gsap-hero-phone', { opacity: 0, x: 60 });
        gsap.set('.gsap-scale-in', { opacity: 0, scale: 0.95 });

        onReady(() => {
            try {
                initHeroAnimations();
                initScrollReveals();
                initCounterAnimations();
            } catch (e) {
                console.error('GSAP animation init failed:', e);
                revealAll();
            }
        });
    } catch (e) {
        console.error('GSAP set failed:', e);
        revealAll();
    }
}

// ===== Hero Entrance =====
function initHeroAnimations() {
    const hero = document.querySelector('.hero-animate');
    if (!hero) return;

    const tl = gsap.timeline({ defaults: { ease: 'power3.out' } });

    tl.from(hero.querySelector('[data-hero="subtitle"]'), {
        y: 20, opacity: 0, duration: 0.5,
    })
    .from(hero.querySelector('[data-hero="heading"]'), {
        y: 30, opacity: 0, duration: 0.6,
    }, '-=0.3')
    .from(hero.querySelector('[data-hero="description"]'), {
        y: 20, opacity: 0, duration: 0.5,
    }, '-=0.3')
    .from(hero.querySelector('[data-hero="ctas"]'), {
        y: 20, opacity: 0, duration: 0.5,
    }, '-=0.2')
    .fromTo('.gsap-hero-phone',
        { x: 60, opacity: 0 },
        { x: 0, opacity: 1, duration: 0.8, ease: 'power2.out' },
        '-=0.6'
    );
}

// ===== Scroll-Triggered Reveals =====
function initScrollReveals() {
    // Individual fade-up elements
    gsap.utils.toArray('[data-gsap="fade-up"]').forEach((el) => {
        gsap.fromTo(el,
            { opacity: 0, y: 24 },
            {
                opacity: 1, y: 0,
                scrollTrigger: { trigger: el, start: 'top 85%', once: true },
                duration: 0.6,
                ease: 'power2.out',
            }
        );
    });

    // Stagger groups — children animate in sequence
    gsap.utils.toArray('[data-gsap-stagger]').forEach((container) => {
        const children = container.children;
        if (!children.length) return;

        gsap.fromTo(children,
            { opacity: 0, y: 24 },
            {
                opacity: 1, y: 0,
                scrollTrigger: { trigger: container, start: 'top 85%', once: true },
                duration: 0.5,
                stagger: 0.1,
                ease: 'power2.out',
            }
        );
    });
}

// ===== Counter Animation =====
function initCounterAnimations() {
    const counters = document.querySelectorAll('[data-count-to]');
    if (!counters.length) return;

    counters.forEach((el) => {
        const target = parseFloat(el.dataset.countTo);
        const prefix = el.dataset.countPrefix || '';
        const suffix = el.dataset.countSuffix || '';
        const decimals = el.dataset.countDecimals ? parseInt(el.dataset.countDecimals) : 0;
        const obj = { val: 0 };

        ScrollTrigger.create({
            trigger: el,
            start: 'top 85%',
            once: true,
            onEnter: () => {
                gsap.to(obj, {
                    val: target,
                    duration: 1.5,
                    ease: 'power2.out',
                    onUpdate: () => {
                        el.textContent = prefix + (decimals > 0
                            ? obj.val.toFixed(decimals)
                            : Math.round(obj.val)) + suffix;
                    },
                });
            },
        });
    });
}

