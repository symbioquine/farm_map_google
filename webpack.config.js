const webpack = require('webpack');


module.exports = {
  entry: {
    'farmOS.map.behaviors.google': {
      'import': `${__dirname}/src/main.js`,
    },
  },
  output: {
    path: `${__dirname}/farm_map_google/js`,
    filename: '[name].js',
    clean: true,
  },
  performance: {
    hints: false,
  },
  devServer: {
    proxy: {
      context: () => true,
      target: 'http://localhost:80',
      bypass: function (req, res, proxyOptions) {
        if (req.path.indexOf('modules/farm_map_google/js/') !== -1) {
          return '/' + req.path.split('/').pop();
        }
        if (req.path.indexOf('.hot-update.js') !== -1) {
          return '/' + req.path.split('/').pop();
        }
      },
    },
  },
  module: {
    rules: [
      {
        test: /\.css$/,
        use: [
          { loader: 'style-loader' },
          { loader: 'css-loader' },
        ],
      },
    ],
  },
};
