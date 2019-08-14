import {Service} from "../api/service";

export class ServiceEditor {

    constructor(slug) {
        this._title = document.getElementById('tctitle');
        this._url = document.getElementById('tcurl');
        this._description = document.getElementById('tcdescription');
        this._category = document.getElementById('tccategory');
        this._slug = ''; // should be a string
        this._icon = ''; // should be a string, too

        if (slug === null) {
            // init a fresh form
        } else {
            this._slug = slug;
        }
    }

    submitForm() {

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

}
