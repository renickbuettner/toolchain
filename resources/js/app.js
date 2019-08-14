/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */
import {ServiceEditor} from "./editor/serviceEditor";
import {ToolchainAPI} from "./api/api";
import {ActionsToolbar} from "./generals/actions";
import {i18n} from "./generals/i18n";

require('./bootstrap');

window.tc = {
    shortInfo: 'This is the toolchain framework',
    version: '1.0.0',
    paths: {
        dashboard: '/dashboard'
    }
};

// add dependencies
window.tc.api = new ToolchainAPI();
window.tc.i18n = new i18n();
window.tc.actions = new ActionsToolbar();

// initiate editor if needed
ServiceEditor.watch();
