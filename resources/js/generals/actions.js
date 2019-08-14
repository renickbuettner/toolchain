import {Service} from "../api/service";

export class ActionsToolbar {

    constructor() {
        const element = document.getElementById('tcactions');
        if (element && element.classList && element.classList.contains('actions')){
            this._api = window.tc.api;

            try {
                this._render(element);
            } catch (e) {
                console.debug(e);
            }
        }
    }

    /**
     * render toolbar
     * @private
     */
    _render(element) {
        this._actions = element;
        this._btns = [];

        // add icons if enabled
        this._addActionDelete();
        this._addActionEdit();
    }

    /**
     * register event listener for delete button
     * @private
     */
    _addActionEdit() {
        let btn = this._actions.getElementsByClassName('edit')[0];
        if (btn === undefined) {
            return;
        }

        btn.onclick = ((event) => {
            window.location.href = Service.editorUrl(this._api.getSlug());
        }).bind(this);

        this._btns.edit = btn;
    }

    /**
     * register event listener for delete button
     * @private
     */
    _addActionDelete() {
        let btn = this._actions.getElementsByClassName('delete')[0];
        if (btn === undefined) {
            return;
        }

        btn.onclick = ((event) => {
            this._api.removeService(window.tc.api.getSlug())
        }).bind(this);

        this._btns.delete = btn;
    }

}
