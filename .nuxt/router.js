import Vue from 'vue'
import Router from 'vue-router'
import { interopDefault } from './utils'

const _5c447133 = () => interopDefault(import('..\\resources\\nuxt\\pages\\CallBack.vue' /* webpackChunkName: "pages_CallBack" */))
const _50925544 = () => interopDefault(import('..\\resources\\nuxt\\pages\\Card.vue' /* webpackChunkName: "pages_Card" */))
const _52cb0601 = () => interopDefault(import('..\\resources\\nuxt\\pages\\Comment.vue' /* webpackChunkName: "pages_Comment" */))
const _2832d83a = () => interopDefault(import('..\\resources\\nuxt\\pages\\DeletePick.vue' /* webpackChunkName: "pages_DeletePick" */))
const _b853dafe = () => interopDefault(import('..\\resources\\nuxt\\pages\\ExampleComponent.vue' /* webpackChunkName: "pages_ExampleComponent" */))
const _898c60a6 = () => interopDefault(import('..\\resources\\nuxt\\pages\\Home.vue' /* webpackChunkName: "pages_Home" */))
const _19ef6e65 = () => interopDefault(import('..\\resources\\nuxt\\pages\\Like.vue' /* webpackChunkName: "pages_Like" */))
const _43b14dec = () => interopDefault(import('..\\resources\\nuxt\\pages\\logined.vue' /* webpackChunkName: "pages_logined" */))
const _2c39d5a9 = () => interopDefault(import('..\\resources\\nuxt\\pages\\MyPage.vue' /* webpackChunkName: "pages_MyPage" */))
const _50792a20 = () => interopDefault(import('..\\resources\\nuxt\\pages\\PickComment.vue' /* webpackChunkName: "pages_PickComment" */))
const _975d511a = () => interopDefault(import('..\\resources\\nuxt\\pages\\PostDetailComments.vue' /* webpackChunkName: "pages_PostDetailComments" */))
const _5a7c025c = () => interopDefault(import('..\\resources\\nuxt\\pages\\PostForm.vue' /* webpackChunkName: "pages_PostForm" */))
const _297a4ee2 = () => interopDefault(import('..\\resources\\nuxt\\pages\\PostLazyLoadable.vue' /* webpackChunkName: "pages_PostLazyLoadable" */))
const _ee696cd8 = () => interopDefault(import('..\\resources\\nuxt\\pages\\index.vue' /* webpackChunkName: "pages_index" */))

Vue.use(Router)

if (process.client) {
  if ('scrollRestoration' in window.history) {
    window.history.scrollRestoration = 'manual'

    // reset scrollRestoration to auto when leaving page, allowing page reload
    // and back-navigation from other pages to use the browser to restore the
    // scrolling position.
    window.addEventListener('beforeunload', () => {
      window.history.scrollRestoration = 'auto'
    })

    // Setting scrollRestoration to manual again when returning to this page.
    window.addEventListener('load', () => {
      window.history.scrollRestoration = 'manual'
    })
  }
}
const scrollBehavior = function (to, from, savedPosition) {
  // if the returned position is falsy or an empty object,
  // will retain current scroll position.
  let position = false

  // if no children detected and scrollToTop is not explicitly disabled
  if (
    to.matched.length < 2 &&
    to.matched.every(r => r.components.default.options.scrollToTop !== false)
  ) {
    // scroll to the top of the page
    position = { x: 0, y: 0 }
  } else if (to.matched.some(r => r.components.default.options.scrollToTop)) {
    // if one of the children has scrollToTop option set to true
    position = { x: 0, y: 0 }
  }

  // savedPosition is only available for popstate navigations (back button)
  if (savedPosition) {
    position = savedPosition
  }

  return new Promise((resolve) => {
    // wait for the out transition to complete (if necessary)
    window.$nuxt.$once('triggerScroll', () => {
      // coords will be used if no selector is provided,
      // or if the selector didn't match any element.
      if (to.hash) {
        let hash = to.hash
        // CSS.escape() is not supported with IE and Edge.
        if (typeof window.CSS !== 'undefined' && typeof window.CSS.escape !== 'undefined') {
          hash = '#' + window.CSS.escape(hash.substr(1))
        }
        try {
          if (document.querySelector(hash)) {
            // scroll to anchor by returning the selector
            position = { selector: hash }
          }
        } catch (e) {
          console.warn('Failed to save scroll position. Please add CSS.escape() polyfill (https://github.com/mathiasbynens/CSS.escape).')
        }
      }
      resolve(position)
    })
  })
}

export function createRouter() {
  return new Router({
    mode: 'history',
    base: decodeURI('/'),
    linkActiveClass: 'nuxt-link-active',
    linkExactActiveClass: 'nuxt-link-exact-active',
    scrollBehavior,

    routes: [{
      path: "/CallBack",
      component: _5c447133,
      name: "CallBack"
    }, {
      path: "/Card",
      component: _50925544,
      name: "Card"
    }, {
      path: "/Comment",
      component: _52cb0601,
      name: "Comment"
    }, {
      path: "/DeletePick",
      component: _2832d83a,
      name: "DeletePick"
    }, {
      path: "/ExampleComponent",
      component: _b853dafe,
      name: "ExampleComponent"
    }, {
      path: "/Home",
      component: _898c60a6,
      name: "Home"
    }, {
      path: "/Like",
      component: _19ef6e65,
      name: "Like"
    }, {
      path: "/logined",
      component: _43b14dec,
      name: "logined"
    }, {
      path: "/MyPage",
      component: _2c39d5a9,
      name: "MyPage"
    }, {
      path: "/PickComment",
      component: _50792a20,
      name: "PickComment"
    }, {
      path: "/PostDetailComments",
      component: _975d511a,
      name: "PostDetailComments"
    }, {
      path: "/PostForm",
      component: _5a7c025c,
      name: "PostForm"
    }, {
      path: "/PostLazyLoadable",
      component: _297a4ee2,
      name: "PostLazyLoadable"
    }, {
      path: "/",
      component: _ee696cd8,
      name: "index"
    }],

    fallback: false
  })
}
