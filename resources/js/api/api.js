import {Service} from "./service";

export class ToolchainAPI {

    constructor() {
        this._exceptionInvalidSlug = 'Invalid slug exception';
    }

    putService(service) {
        if (service instanceof Service) {
            throw new Error('Cannot put non-service object');
        }

        const payload = service.toArray();

        axios.post(`/service/${service.slug}`, payload)
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });
    }

    getService(slug, callback) {
        if (!this._matchSlug(slug)) {
            throw new Error(this._exceptionInvalidSlug);
        }

        axios.get(`/service/${service.slug}`)
            .then(function (response) {
                callback(response)
            })
            .catch(function (error) {
                console.log(error);
            });
    }

    getSlug() {
        let slug = null;
        const fromUrl = window.location.pathname.replace(/^\/editor\//gi, '');

        if (this._matchSlug(fromUrl)) {
            slug = fromUrl;
        } else {
            throw new Error(this._exceptionInvalidSlug);
        }

        return slug;
    }

    _matchSlug(slug) {
        return slug.match(/^[a-z-0-9]+$/);
    }
}
