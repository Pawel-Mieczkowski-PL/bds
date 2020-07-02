module.exports = {
    entry: './src/js/app.js',
    output: {
      path: __dirname + '/dist',
      publicPath: '/javascript/',
      filename: 'app.js'
    },
    module: {
      rules: [
        {
          test: /\.(js|jsx)$/,
          exclude: /node_modules/,
          use: {
            loader: "babel-loader"
          }
        },
        {
          test: /\.css$/i,
          use: [
            'extract-loader',
            'css-loader',
          ],
        },
      ],
    }
  };