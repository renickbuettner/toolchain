/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

require('./bootstrap');

window.tc = {
    shortInfo: 'This is the toolchain framework',
    version: '1.0.0',
    api: require('./api/api')
};

require('./editor/editor');
