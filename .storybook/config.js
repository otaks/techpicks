import { configure } from '@storybook/vue'
import Vue from 'vue'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faHome, faSearch, faChartLine, faUser, faPen } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faHome, faSearch, faChartLine, faUser, faPen)

Vue.component('font-awesome-icon', FontAwesomeIcon)

import Buefy from 'buefy'
import 'buefy/dist/buefy.css'

Vue.use(Buefy)

const requireContext = require.context('../resources/nuxt/components/', true, /stories\.js$/);

configure((() => {
    requireContext.keys().map(requireContext);
}), module);

