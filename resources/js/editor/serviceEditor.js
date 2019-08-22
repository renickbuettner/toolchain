import {Service} from "../api/service";
import {WysiwygEditor} from "./wysiwyg";
import {Dialog} from "../generals/dialog";

export class ServiceEditor {

    constructor(slug) {
        this._i18n = window.tc.i18n.getString;
        this._api = window.tc.api;
        this._title = document.getElementById('tctitle');
        this._url = document.getElementById('tcurl');
        this._description = document.getElementById('tcdescription');
        this._shortdescription = document.getElementById('tcshortdescription');
        this._category = document.getElementById('tccategory');
        this._icon = document.getElementById('tcicon');
        this._slug = ''; // should be a string

        this._registerOnSave();
        this._registerOnBack();
        this._registerWysiwygEditor();
        this._registerValueValidation();

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
            this._category.value = service.category;
            this._slug = service.slug;
            this._icon.value = service.icon;
            this._description.value = service.description;
            this._description.value = service.description;
            this._shortdescription.value = service.shortdescription;
            this._wysiwyg.setContent(service.description);

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
                description: this._wysiwyg.getContent(),
                shortdescription: this._shortdescription.value,
                url: this._url.value,
                icon: this._icon.value,
                category: this._category.value,
                slug: this._slug
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
        this._btnSubmit.onclick = ((event) => {
            if (!this._hasValidInput()) {
                const params = {
                    title: this._i18n('editor.invalid.title'),
                    content: this._i18n('editor.invalid.info'),
                    actions: [
                        {title: this._i18n('editor.invalid.hide'), attrs: null, className: 'btn-default abort'}
                    ],
                    _class: 'confirmation-dialog delete'
                };

                this._dialog = new Dialog(params);
                this._dialog.show();

                return;
            }

            const service = this._getFormData();
            this._api.putService(service);
        }).bind(this);
    }

    /**
     * register event listener for back button
     */
    _registerOnBack() {
        this._btnBack = document.getElementById('tceditorback');
        this._btnBack.onclick = (event) => {
            window.location.href = ServiceEditor.getPreviousRoute();
        };
    }

    /**
     * register the description input as rich text editor
     */
    _registerWysiwygEditor() {
        this._wysiwyg = new WysiwygEditor(this._description);
    }

    _registerValueValidation() {
        const validateTitle = (() => {
            if (!this._title.value.match(/^([A-Za-z0-9 ])+$/)) {
                this._title.classList.add('invalid');
                return;
            }

            this._title.classList.remove('invalid');
        }).bind(this);

        const validateCategory = (() => {
            if (!this._category.value.match(/^([A-Za-z0-9\-_])+$/)) {
                this._category.classList.add('invalid');
                return;
            }

            this._category.classList.remove('invalid');
        }).bind(this);

        const validateShortDescription = (() => {

            if (!this._shortdescription.value.match(/^[A-Za-z0-9\-_]+/)) {
                this._shortdescription.classList.add('invalid');
                return;
            }

            if(this._shortdescription.value.length > 100){
                this._shortdescription.classList.add('invalid');
                alert('Der Text darf nicht länger als 100 Zeichen sein');
                return;
            }

            this._shortdescription.classList.remove('invalid');
        }).bind(this);

        this._title.onkeypress = validateTitle;
        this._category.onkeypress = validateCategory;
        this._shortdescription.onkeypress = validateShortDescription;
        this._title.onchange = validateTitle;
        this._category.onchange = validateCategory;
        this._shortdescription.onchange = validateShortDescription;
    }

    _hasValidInput() {
        return (!this._category.classList.contains('invalid') && !this._title.classList.contains('invalid'));
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
