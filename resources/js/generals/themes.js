export class ThemeManager {

    constructor() {
        this._body = document.body;
        this._themes = {};
        this._currentTheme = null;
        this._addTheme(new Theme('day', '', null));
        this._addTheme(new Theme('night', 'dark', null));
        this._addTheme(new Theme('print', 'print', null));

        if (window._defaultTheme !== undefined || this._default()) {
            this.enable(this._default() || window._defaultTheme);
        }
    }

    /**
     * @param {Theme} theme
     * @private
     */
    _addTheme(theme) {
        this._themes[theme.slug] = theme;
    }

    /**
     * @param {String} slug
     */
    enable(slug, _temponary) {
        try {
            this._body.className = this._themes[slug] && this._themes[slug].className || '';
            this._currentTheme = slug;
            if (!_temponary) {
                this._default(slug);
            }
        } catch (e) {
            console.error(e);
        }
    }

    disable() {
        this._body.className = '';
        this._currentTheme = null;
        this._default(null);
    }

    current() {
        return this._currentTheme || null;
    }

    _default(_default) {
        const prop = '_defaultTheme';
        try {
            if (_default !== undefined) {
                localStorage.setItem(prop, _default);
                return;
            }

            return localStorage.getItem(prop);
        } catch (e) {}
    }
}

class Theme {

    /**
     * @param {String} slug
     * @param {String} _class
     * @param options
     */
    constructor(slug, _class, options) {
        this._class = _class;
        this._slug = slug;
        this._options = options;
    }

    get slug() {
        return this._slug;
    }

    set slug(value) {
        this._slug = value;
    }

    get className() {
        return this._class;
    }

    set className(value) {
        this._class = value;
    }

    get options() {
        return this._options;
    }

    set options(value) {
        this._options = value;
    }
}
