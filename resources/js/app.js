/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */
import {ServiceEditor} from "./editor/serviceEditor";
import {ToolchainAPI} from "./api/api";

require('./bootstrap');

window.tc = {
    shortInfo: 'This is the toolchain framework',
    version: '1.0.0',
    api: new ToolchainAPI()
};

// create a new service
const _newEditor = window.location.pathname.match(/^\/editor$/gi);
if (_newEditor) {
 window.tc.editor = new ServiceEditor(null);
} else if (!_newEditor && window.location.pathname.match(/^\/editor/gi)) {
    window.tc.editor = new ServiceEditor(window.tc.api.getSlug());
}
