export class WysiwygEditor {

    constructor(parentElement) {
        if (parentElement && parentElement.type !== 'textarea') {
            throw new Error('Invalid editor parent-element type. Must be a textarea');
        }

        this._triggerClass = 'wysiwyg';

        this._parentElement = parentElement;
        this._renderEditor();
    }

    getContent() {
        if (this._parentElement && this._parentElement.type === 'textarea') {
            return $(`#${this._parentElement.id}`).trumbowyg('html');
        } else {
            throw new Error('Editor parentElement is not initialized');
        }
    }

    setContent(html) {
        if (this._parentElement && this._parentElement.type === 'textarea') {
            $(`#${this._parentElement.id}`).trumbowyg('html', html);
        } else {
            throw new Error('Editor parentElement is not initialized');
        }
    }

    _renderEditor() {
        this._trumbowyg = $(`#${this._parentElement.id}`).trumbowyg();
    }
}
