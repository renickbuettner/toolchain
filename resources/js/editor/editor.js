export class Editor {

    constructor(parentElement) {
        if (parentElement && parentElement.type !== 'textarea') {
            throw new Error('Invalid editor parent-element type. Must be a textarea');
        }

        this._parentElement = parentElement;
        this._renderEditor();
    }

    get getContent() {

    }

    set setContent(html) {

    }

    _renderEditor() {
        // to some fancy stuff
    }
}
