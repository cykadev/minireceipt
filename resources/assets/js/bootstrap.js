
window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    // window.$ = window.jQuery = require('jquery');

require('../sass/porto/vendor/jquery/jquery.js');
// require('../sass/porto/vendor/modernizr/modernizr.js');
// require('../sass/porto/vendor/jquery-browser-mobile/jquery.browser.mobile.js');
// require('../sass/porto/vendor/bootstrap/js/bootstrap.js');
// require('../sass/porto/vendor/nanoscroller/nanoscroller.js');
// require('../sass/porto/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js');
// require('../sass/porto/vendor/magnific-popup/jquery.magnific-popup.js');
// require('../sass/porto/vendor/jquery-placeholder/jquery-placeholder.js');

// require('../sass/porto/vendor/jqueryui-touch-punch/jqueryui-touch-punch.js');
// require('../sass/porto/vendor/jquery-appear/jquery-appear.js');
// require('../sass/porto/vendor/bootstrap-multiselect/bootstrap-multiselect.js');

// require('../sass/porto/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js');

// require('../sass/porto/vendor/flot/jquery.flot.js');
// require('../sass/porto/vendor/flot.tooltip/flot.tooltip.js');
// require('../sass/porto/vendor/flot/jquery.flot.pie.js');
// require('../sass/porto/vendor/flot/jquery.flot.categories.js');
// require('../sass/porto/vendor/flot/jquery.flot.resize.js');

// require('../sass/porto/vendor/jquery-sparkline/jquery-sparkline.js');
// require('../sass/porto/vendor/raphael/raphael.js');
// require('../sass/porto/vendor/morris.js/morris.js');
// require('../sass/porto/vendor/gauge/gauge.js');
// require('../sass/porto/vendor/snap.svg/snap.svg.js');
// require('../sass/porto/vendor/liquid-meter/liquid.meter.js');
// require('../sass/porto/vendor/jqvmap/jquery.vmap.js');
// require('../sass/porto/vendor/jqvmap/data/jquery.vmap.sampledata.js');
// require('../sass/porto/vendor/jqvmap/maps/jquery.vmap.world.js');
// require('../sass/porto/vendor/jqvmap/maps/continents/jquery.vmap.africa.js');
// require('../sass/porto/vendor/jqvmap/maps/continents/jquery.vmap.asia.js');
// require('../sass/porto/vendor/jqvmap/maps/continents/jquery.vmap.australia.js');
// require('../sass/porto/vendor/jqvmap/maps/continents/jquery.vmap.europe.js');
// require('../sass/porto/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js');
// require('../sass/porto/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js');
require('../sass/porto/javascripts/theme.js');
require('../sass/porto/javascripts/theme.custom.js');
require('../sass/porto/javascripts/theme.init.js');
require('../sass/porto/javascripts/dashboard/examples.dashboard.js');

} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
