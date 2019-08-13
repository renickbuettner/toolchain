export class Service {
    constructor({title, description, url, slug, icon, category}) {
        this._title = title;
        this._description = description;
        this._url = url;
        this._slug = slug;
        this._icon = icon;
        this._category = category;
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

    get toArray() {
        return {
            'title': this.title,
            'description': this.description,
            'url': this.url,
            'slug': this.slug,
            'icon': this.icon,
            'category': this.category
        };
    }

    get serialize() {
        return JSON.stringify(this.toArray());
    }
}

