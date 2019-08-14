import {Service} from "../api/service";

export class ServiceEditor {

    constructor(slug) {
        this._api = window.tc.api;
        this._title = document.getElementById('tctitle');
        this._url = document.getElementById('tcurl');
        this._description = document.getElementById('tcdescription');
        this._category = document.getElementById('tccategory');
        this._slug = ''; // should be a string
        this._icon = ''; // should be a string, too

        this._registerOnSave();
        this._registerOnBack();

        if (slug === null) {
            // init a fresh form
        } else {
            this._slug = slug;
            this._api.getService(slug);
        }
    }

    submitForm() {
        try {
            const service = this._getFormData();
            this._api.putService(service);

        } catch (e) {
            console.error(e);
            alert('The request has not been send to the server. Internal error.');
        }
    }

    loadService(service) {
        try {
            this._title.value = service.title;
            this._url.value = service.url;
            this._description.value = service.description;
            this._category.value = service.category;
            this._slug = service.slug;
            this._icon = service.icon;

        } catch (e) {
            console.debug(e);
            throw new Error('Can not load service');
        }
    }

    /**
     * returns Service object
     * @private
     */
    _getFormData() {
        let payload;
        try {
            payload = {
                title: this._title.value,
                description: this._description.value,
                url: this._url.value,
                slug: this._slug,
                icon: this._icon,
                category: this._category.value
            };
        } catch (e) {
            throw e;
        }

        return new Service(payload);
    }

    /**
     * register event listener for save button
     */
    _registerOnSave() {
        this._btnSubmit = document.getElementById('tceditorsubmit');
        this._btnSubmit.onclick = (event) => {
            const service = this._getFormData();
            this._api.putService(service);
        }
    }

    _registerOnBack() {
        this._btnBack = document.getElementById('tceditorback');
        this._btnBack.onclick = (event) => {
            window.location.href = ServiceEditor.getPreviousRoute();
        };
    }

    /**
     * editor should start when needed
     */
    static watch() {
        const _newEditor = window.location.pathname.match(/^\/editor$/gi);
        if (_newEditor) {
            window.tc.editor = new ServiceEditor(null);
        } else if (!_newEditor && window.location.pathname.match(/^\/editor/gi)) {
            window.tc.editor = new ServiceEditor(window.tc.api.getSlug());
        }
    }

    /**
     * decide where to navigation on back
     * history.back() doesnt work because
     * of accept-header from xhr request
     */
    static getPreviousRoute() {
        if (window.tc.api.getSlug() ===  null) {
            return window.tc.paths.dashboard;
        } else {
            return window.tc._service && window.tc._service.getServiceURL();
        }
    }
}
