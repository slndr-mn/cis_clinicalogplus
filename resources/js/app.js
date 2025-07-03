import { createApp } from 'vue';
import Sidebar from './components/Sidebar.vue';
import Header from './components/Header.vue';

import '../js/plugin/webfont/webfont.min.js';
import '../js//core/jquery-3.7.1.min.js';
import '../js//core/popper.min.js';
import '../js//core/bootstrap.min.js';



const mount = (selector, component) => {
    const el = document.querySelector(selector);
    if (el) {
        createApp(component).mount(el);
    }
};

mount('#sidebar', Sidebar);
mount('#header', Header);
 