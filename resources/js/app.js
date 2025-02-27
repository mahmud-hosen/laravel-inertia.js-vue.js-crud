import { createApp, h } from 'vue'
import { createInertiaApp, Link } from '@inertiajs/vue3'
import { createStore } from 'vuex'
import storeInfo from './store/store.js'

// Create a new store instance.
const store = createStore({
  storeInfo
})

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(store)
    // Register Link component globally
    app.component('InertiaLink', Link)

    app.mount(el)
  },
})