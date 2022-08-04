window._ = require('lodash');

try {
    require('bootstrap');
} catch (e) { }

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
function rekapanPertanggal() {
    warning = false;
    let tgl_awal = document.getElementById('tglawal').value;
    let tgl_akhir = document.getElementById('tglakhir').value;

    if (tgl_awal == '') {
        warning = true;
    }
    if (tgl_akhir == '') {
        warning = true;
    }
    if (!warning) {
        window.open('http://' + window.location.host + '/rekapan-pertanggal/' + tgl_awal + '/' + tgl_akhir, '_blank').focus();
    } else {
        alert('Tanggal awal atau Tanggal akhir kosong!');
    }
}
window.cetakPertanggal = cetakPertanggal;

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
