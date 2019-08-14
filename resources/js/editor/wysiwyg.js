export class WysiwygEditor {

    constructor(parentElement) {
        if (parentElement && parentElement.type !== 'textarea') {
            throw new Error('Invalid editor parent-element type. Must be a textarea');
        }

        this._parentElement = parentElement;
        this._renderEditor();
    }

    get getContent() {
        if (parentElement && parentElement.type !== 'textarea') {
            this._parentElement.value()
        } else {
            throw new Error('Editor parentElement is not initialized');
        }
    }

    set setContent(html) {
        if (parentElement && parentElement.type !== 'textarea') {
            this._parentElement.innerHTML = html;
        } else {
            throw new Error('Editor parentElement is not initialized');
        }
    }

    _renderEditor() {
        // to some fancy stuff
    }
}
