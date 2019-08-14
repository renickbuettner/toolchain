const $ = require('jquery');
import Util from 'bootstrap/js/src/util'
import Modal from 'bootstrap/js/src/modal'

export class Dialog {

    /**
     * dynamically create a dialog with
     * the paraments and remove element
     * on hide.
     *
     * uses Bootstrap@4.* modal component
     * dependency does not automatically
     * inject, please add manually
     *
     * @param title
     * @param content
     * @param actions
     * @param _class
     */
    constructor({title, content, actions, _class}) {
        this._title = title;
        this._content = content;
        this._class = _class;
        this._actions = actions;
        this._dialog = null;
    }

    /**
     * render dialog and make it
     * visible to the user
     */
    show() {
        const elem = this._renderDialog();

        this._dialog = new Modal(elem);
        this._dialog._elem = elem;
        this._dialog.show();
    }

    hide() {
        this._dialog.hide();
        this._dialog._elem.remove();
    }

    _renderDialog() {
        let div = document.createElement('div');
        div.className = `modal ${this._class}`;
        div.tabIndex = -1;
        div.role = 'dialog';
        div.style.display = 'none';

        let dialog = document.createElement('div');
        dialog.className = 'modal-dialog modal-dialog-centered';
        dialog.role = 'document';
        div.append(dialog);

        let content = document.createElement('div');
        content.className = 'modal-content';
        dialog.append(content);

        let header = document.createElement('div');
        header.className = 'modal-header';
        content.append(header);

        let title = document.createElement('h5');
        title.className = 'modal-title';
        title.innerText = this._title;
        header.append(title);

        let dismissIconBtn = document.createElement('button');
        dismissIconBtn.type = 'button';
        dismissIconBtn.className = 'close';
        dismissIconBtn.onclick = (() => {
            this.hide();
        }).bind(this);
        dismissIconBtn.setAttribute('data-dismiss', 'modal');
        dismissIconBtn.setAttribute('aria-label', 'Close');
        header.append(dismissIconBtn);

        let dismissIconBtnInner = document.createElement('span');
        dismissIconBtnInner.innerText = 'x';
        dismissIconBtnInner.setAttribute('aria-hidden', 'true');
        dismissIconBtn.append(dismissIconBtnInner);

        let body = document.createElement('div');
        body.className = 'modal-body';
        body.innerHTML = this._content;
        content.append(body);

        let footer = document.createElement('footer');
        footer.className = 'modal-footer';
        content.append(footer);

        this._actions.forEach(((action) => {
            footer.append(this._renderAction(action));
        }).bind(this));

        return div;
    }

    _renderAction({title, attrs, className}) {
        if (attrs === null || attrs === undefined) {
            attrs = [];
        }

        if (className.match(/(abort)/gi)) {
            attrs[0] = ['data-dismiss', 'modal'];
            attrs[1] = ['onclick', ((event) => {
                this.hide();
            }).bind(this)];
        }

        let action = document.createElement('button');
        action.className = `btn ${className}`;
        action.type = 'button';
        action.innerText = title;
        attrs.forEach(([key, val]) => {
            if (key === 'onclick') {
                action.onclick = val;
                return;
            }

            action.setAttribute(key, val);
        });

        return action;
    }

}
