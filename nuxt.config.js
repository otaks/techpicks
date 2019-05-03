module.exports = {
  /*
  ** Headers of the page
  */
  head: {
    title: 'tech',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: 'Nuxt.js project' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
    ]
  },
  /*
  ** Customize the progress bar color
  */
  loading: { color: '#3B8070' },
  /*
  ** Build configuration
  */
  build: {
    /*
    ** Run ESLint on save
    */
    extend (config, { isDev, isClient }) {
      if (isDev && isClient) {
        config.module.rules.push({
          enforce: 'pre',
          test: /\.(js|vue)$/,
          loader: 'eslint-loader',
          exclude: /(node_modules)/
        })
      }
    }
  },
  srcDir: 'resources/nuxt',
  modules: [
    '@nuxtjs/axios',    
    '@nuxtjs/auth',
    'nuxt-buefy',

    '@nuxtjs/proxy',
    'nuxt-fontawesome'
  ],

  fontawesome: {
    imports: [
      {
        set: '@fortawesome/free-solid-svg-icons',
        icons: ['fas']
      }
    ]
  },  

  axios: {
    proxy: true,
    //baseURL: 'http://localhost:8000',
    proxyHeaders: false,
    credentials: false
  },  

  router: {
    middleware: ['auth']
  },
  
  proxy: {
    '/api/': 
      {
        target:'https://platform-lookaside.fbsbx.com',
        pathRewrite: {'^/api/': '/platform/profilepic/'}
      }
  },
  

  plugins: [
    '~/plugins/axios', 
    '~plugins/common-components'
  ],

  auth: {
    login: '/login',
    logout: '/',
    strategies: {
      facebook: {
        client_id: '422260875003070',
        userinfo_endpoint: 'https://graph.facebook.com/v2.12/me?fields=about,name,picture{url},email,birthday&locale=ja_JP',
        //scope: ['public_profile', 'email', 'user_birthday']
        scope: ['public_profile', 'email']
      },      
      local: {
        endpoints: {
          login: {url: '/api/auth/login', method: 'post', propertyName: 'access_token'},
          logout: {url: '/api/auth/logout', method: 'post', },
          user: {url: '/api/auth/user', method: 'get', propertyName: 'user'},
        },
        tokenRequired: true,
        tokenType: 'Bearer', // Case sensitive when dealing with Laravel backend.
      },
    },
    redirect: {
      login: '/',
      logout: '/',
      callback: '/CallBack',
      home: '/logined',
    },    
  }  
}

