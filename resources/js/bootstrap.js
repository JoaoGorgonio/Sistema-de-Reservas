import _ from 'lodash';

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Uncomment the following lines if you need to use Laravel Echo and Pusher
// import Echo from 'laravel-echo';
// import Pusher from 'pusher-js';
// window.Pusher = Pusher;
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     wsHost: process.env.MIX_PUSHER_HOST || `ws-${process.env.MIX_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: process.env.MIX_PUSHER_PORT || 6001,
//     wssPort: process.env.MIX_PUSHER_PORT || 6001,
//     forceTLS: process.env.MIX_PUSHER_SCHEME === 'https',
//     enabledTransports: ['ws', 'wss'],
// });
