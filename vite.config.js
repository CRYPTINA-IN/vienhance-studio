import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({

            input: ['resources/css/app.css',
                'resources/css/bootstrap.css',
                'resources/css/slicknav.css',
                'resources/css/swiper-bundle.css',
                'resources/css/animate.css',
                'resources/css/magnific-popup.css',
                'resources/css/mousecursor.css',
                'resources/js/jquery-3.7.1.min.js' , 'resources/js/bootstrap.js',
                'resources/js/validator.min.js', 'resources/js/jquery.slicknav.js',
                'resources/js/swiper-bundle.min.js', 'resources/js/jquery.waypoints.min.js',
                'resources/js/jquery.counterup.min.js', 'resources/js/isotope.min.js',
                'resources/js/jquery.magnific-popup.min.js', 'resources/js/SmoothScroll.js',
                'resources/js/parallaxie.js', 'resources/js/magiccursor.js',
                'resources/js/SplitText.js', 'resources/js/ScrollTrigger.min.js',
                'resources/js/wow.min.js', 'resources/js/function.js'

            ],
            refresh: true,
        }),
    ],
});
