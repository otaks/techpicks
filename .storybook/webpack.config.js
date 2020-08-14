const path = require('path')
module.exports = {
  module: {
    rules: [
      {
        test: /\.sass$/,
        use: [
          'vue-style-loader',
          'css-loader',
          {
            loader: 'sass-loader',
            options: {
              indentedSyntax: true
            }
          },
          {
            loader: 'sass-resources-loader',
            options: {
              resources: [
                path.resolve(__dirname, '../resources/assets/sass/_variables.sass'),
                path.resolve(__dirname, '../resources/assets/sass/_mixins.sass')
              ],
              include: path.resolve(__dirname, '../')
            }
          }
        ]

      },
      {
        test: /\.?css$/,
        use: [
          'vue-style-loader',
          'css-loader',
          'sass-loader'
        ],
      },
      {
        test: /\.(jpg|png)$/,
        loaders: 'url-loader'
      }
    ]
  },
  resolve: {
    alias: {
      '@': path.dirname(path.resolve(__dirname))
    }
  }
}