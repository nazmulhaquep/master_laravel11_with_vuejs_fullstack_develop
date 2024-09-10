#laravel 11

create project

composer create-project laravel/laravel:^11.0 master_laravel6_with_vuejs_fullstack_develop

vite install

npm install --save-dev @vitejs/plugin-vue

add the below code at vite.config.js

from link: https://laravel.com/docs/11.x/vite#vue


install inertia dependencies command from below link

https://inertiajs.com/server-side-setup

command

composer require inertiajs/inertia-laravel

resources/views/app.blade.php paste the below code from

https://inertiajs.com/server-side-setup



inertia publish middleware

php artisan inertia:middleware


application's bootstrap/app.php file.
-------------------------------------

use App\Http\Middleware\HandleInertiaRequests;

->withMiddleware(function (Middleware $middleware) {
    $middleware->web(append: [
        HandleInertiaRequests::class,
    ]);
})

client site setup add
---------------------
npm install @inertiajs/vue3


resources/js/app.js
-------------------

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
})





master_laravel6_with_vuejs_fullstack_develop



#FullCalendar

npm install --save \ @fullcalendar/core \ @fullcalendar/timegrid

or package.json add the below code and npm update

"dependencies": {
        "@fullcalendar/daygrid": "^6.1.15",
        "@fullcalendar/interaction": "^6.1.15",
        "@fullcalendar/timegrid": "^6.1.15",
        "@fullcalendar/vue3": "^6.1.15",
        "@inertiajs/vue3": "^1.2.0"
    }
