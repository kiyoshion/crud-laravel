/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

import barba from '@barba/core'
import barbaCss from '@barba/css'
import barbaPrefetch from '@barba/prefetch'
import { replaceHeadTags } from './replaceHeadTags'

function load() {
    return new Promise((resolve, reject) => {
        window.addEventListener('load', () => {
            resolve();
        })
    }, false);
}

const promise = Promise.all([ load() ])

barba.use(barbaCss);
barba.use(barbaPrefetch);

promise.then(() => {
    // barba.hooks.beforeEnter((data) => {
        // replaceHeadTags(data.next.html);
    //     window.scrollTo(0, 0);
    // })
    // barba.hooks.beforeLeave((data) => {
    //     replaceHeadTags(data.current.html);
    // })
    // barba.init({
    //     debug: false,
    //     preventRunning: true,
    //     prevent: ({ el }) => el.getAttribute('href').slice(0, 1) === '#',
    //     transitions: [
    //         {
                
    //         }
    //     ]
    // });
})

const eventDelete = e => {
    if (e.currentTarget.href === window.location.href) {
        e.preventDefault()
        e.stopPropagation()
        return
    }
}

const links = [...document.querySelectorAll('a[href]')]
links.forEach(link => {
    link.addEventListener('click', e => {
        eventDelete(e)
    }, false)
})
