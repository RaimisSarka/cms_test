var Encore = require('@symfony/webpack-encore');
var CopyWebpackPlugin = require('copy-webpack-plugin');

if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .addEntry('app', './assets/js/app.js')
    .addEntry('admin','./assets/js/admin.js')
    .splitEntryChunks()
    .enableSingleRuntimeChunk()
    
    .addPlugin(new CopyWebpackPlugin([
       {
         from: './assets/images', to: 'images'
       }
    ]))

    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())

    
   
    .configureBabel(() => {}, {
        useBuiltIns: 'usage',
        corejs: 3
    })
;
module.exports = Encore.getWebpackConfig();
