'use strict';

module.exports = {
  node: {
    __dirname: true
  },

  watch: true,

  entry: {
    frontend: './frontend/js/app.js',
    admin: './admin/js/app.js'
  },

  output: {
    filename: 'gs-wp-[name].js'
  },

  devtool: true
};