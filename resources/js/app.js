import { createApp } from 'vue';
import Sidebar from './components/Sidebar.vue';
import Header from './components/Header.vue';

// Core
import './core/jquery-3.7.1.min.js';
import './core/popper.min.js';
import './core/bootstrap.min.js';

// Plugins
import './plugin/jquery-scrollbar/jquery.scrollbar.min.js';
import './plugin/sweetalert/sweetalert.min.js';
import './plugin/webfont/webfont.min.js';
import './plugin/jquery.sparkline/jquery.sparkline.min.js';
import './plugin/chart-circle/circles.min.js';
import './plugin/datatables/datatables.min.js';
import './plugin/bootstrap-notify/bootstrap-notify.min.js';
import './plugin/jsvectormap/jsvectormap.min.js';
import './plugin/jsvectormap/world.js';

// Kaiadmin
import './kaiadmin.min.js';
import './setting-demo.js';
import './demo.js';

import './bootstrap';
import '../css/app.css';
import '../css/sidebar.css';


// Optional WebFont loading
if (typeof WebFont !== 'undefined') {
    WebFont.load({
        google: { families: ['Public Sans:300,400,500,600,700'] },
        custom: {
            families: [
                'Font Awesome 5 Solid',
                'Font Awesome 5 Regular',
                'Font Awesome 5 Brands',
                'simple-line-icons'
            ],
            urls: ['/resources/css/fonts.min.css']
        },
        active: function () {
            sessionStorage.fonts = true;
        }
    });
}


// Vue mount (if Vue is used)
const mount = (selector, component) => {
    const el = document.querySelector(selector);
    if (el) {
        createApp(component).mount(el);
    }
};

mount('#sidebar', Sidebar);
mount('#header', Header);
