import {Service} from "./service";

export class ToolchainAPI {

    constructor() {
        this._exceptionInvalidSlug = 'Invalid slug exception';
    }

    putService(service) {
        if (!service instanceof Service) {
            throw new Error('Cannot put non-service object');
        }

        const path = (service.slug === '') ? '/service/create' : `/service/${service.slug}`;
        const method = (service.slug === '') ? 'post' : 'put';

        // let the backend create a slug
        // based on the title
        if (method === 'put') {
            service.slug = '';
        }

        window.axios[method](path, service.getArray())
            .then(function (response) {
                window.location.href = `/service/${response.data.slug}`;
            })
            .catch(function (error) {
                console.log(error);
            });
    }

    getService(slug) {
        if (!this._matchSlug(slug)) {
            throw new Error(this._exceptionInvalidSlug);
        }

        window.axios.get(`/service/${slug}`, {headers: {'Content-Type': 'application/json', 'Accept': 'application/json'}})
            .then(function (response) {
                window.tc._service = new Service(response.data);
                window.tc.editor.loadService(window.tc._service);
            })
            .catch(function (error) {
                console.log(error);
            });
    }

    removeService(slug) {
        if (!this._matchSlug(slug)) {
            throw new Error(this._exceptionInvalidSlug);
        }

        window.axios.delete(`/service/${slug}`, {headers: {'Content-Type': 'application/json', 'Accept': 'application/json'}})
            .then(function (response) {
                window.location.href = window.tc.paths.dashboard;
            })
            .catch(function (error) {
                console.log(error);
            });
    }

    getSlug() {
        let slug = null;
        const fromUrl = window.location.pathname.replace(/^(\/editor\/|\/service\/)/gi, '');

        if (this._matchSlug(fromUrl)) {
            slug = fromUrl;
        }

        return slug;
    }

    _matchSlug(slug) {
        return slug.match(/^[a-z-0-9]+$/);
    }
}
