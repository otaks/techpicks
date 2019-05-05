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
           }
         ]
       },
       {
         test: /\.?css$/,
         use: [
           'vue-style-loader',
           'css-loader',
           'sass-loader'
         ]
      }
    ]
 },
  resolve: {
    alias: {
      '@': path.dirname(path.resolve(__dirname))
    }
  }
}