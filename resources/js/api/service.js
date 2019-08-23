export class Service {
    constructor({title, description, shortdescription, url, slug, icon, category}) {
        this._title = title;
        this._description = description;
        this._url = url;
        this._slug = slug;
        this._icon = icon;
        this._category = category;
        this._shortdescription = shortdescription;
    }

    get title() {
        return this._title;
    }

    get description() {
        return this._description;
    }

    get url() {
        return this._url;
    }

    get slug() {
        return this._slug;
    }

    get icon() {
        return this._icon;
    }

    get category() {
        return this._category;
    }

    get shortdescription() {
        return this._shortdescription;
    }

    set title(value) {
        this._title = value;
    }

    set description(value) {
        this._description = value;
    }

    set url(value) {
        this._url = value;
    }

    set slug(value) {
        this._slug = value;
    }

    set icon(value) {
        this._icon = value;
    }

    set category(value) {
        this._category = value;
    }

    set shortdescription(value) {
        this._shortdescription = value;
    }

    getArray() {
        return {
            'title': this.title,
            'description': this.description,
            'shortdescription': this.shortdescription,
            'url': this.url,
            'slug': this.slug,
            'icon': this.icon,
            'category': this.category,
        };
    }

    serialize() {
        return JSON.stringify(this.getArray());
    }

    getServiceURL() {
        return Service.serviceUrl(this.slug);
    }

    getEditorURL() {
        return Service.editorUrl(this.slug);
    }

    static serviceUrl(slug) {
        return `/service/${slug}`;
    }

    static editorUrl(slug) {
        return `/editor/${slug}`;
    }
}

