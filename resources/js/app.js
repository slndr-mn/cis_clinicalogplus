import './bootstrap'; // Optional Laravel default
import '../css/app.css'; // Import CSS
import { createApp } from 'vue'
import Sidebar from '../js/components/Header.vue';
import Header from '../js/components/Sidebar.vue'


const app = createApp({})


WebFont.load({
    google: { families: ["Public Sans:300,400,500,600,700"] },
    custom: {
        families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
        ], 
        urls: ["/css/fonts.min.css"],
    },
    active: () => sessionStorage.fonts = true,
});
 
// // Include other JS plugins
// import '../js/plugin/chart.js/chart.min.js';
// import '../js/kaiadmin.min.js';
// import '../js/plugin/list.js/list.min.js';
// Add more as needed

app.component('Sidebar', Sidebar)
app.component('HeaderBar', Header)

app.mount('#sidebar') 
app.mount('#header')

