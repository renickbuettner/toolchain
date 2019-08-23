import {Service} from "../api/service";
import {Dialog} from "./dialog";
import {i18n} from "./i18n";

export class ActionsToolbar {

    constructor() {
        const element = document.getElementById('tcactions');
        if (element && element.classList && element.classList.contains('actions')){
            this._api = window.tc.api;
            this._i18n = window.tc.i18n.getString;

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
        this._addActionDayNightSwitch();
        this._addActionPrint();
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

            let confirm = (() => {
                this._api.removeService(this._api.getSlug());
                this._dialog.hide();
            }).bind(this);

            const params = {
                title: this._i18n('actions.delete.item'),
                content: this._i18n('actions.delete.info'),
                actions: [
                    {title: this._i18n('dialog.cancel'), attrs: null, className: 'btn-default abort'},
                    {title: this._i18n('dialog.confirm'), attrs: [['onclick', confirm]], className: 'btn btn-outline-danger confirm'}
                ],
                _class: 'confirmation-dialog delete'
            };

            this._dialog = new Dialog(params);
            this._dialog.show();

        }).bind(this);

        this._btns.delete = btn;
    }

    _addActionDayNightSwitch() {
        let btn = this._actions.getElementsByClassName('ambience')[0];
        if (btn === undefined) {
            return;
        }

        btn.onclick = () => {
            const theme = window.tc.theme;
            const current = theme.current();
            if (current === null || current === 'day') {
                theme.enable('night');
                return;
            }
            theme.enable('day');
        }
    }

    _addActionPrint() {
        let btn = this._actions.getElementsByClassName('print')[0];
        if (btn === undefined) {
            return;
        }

        btn.onclick = () => {
            const theme = window.tc.theme;
            const _name = 'print';

            if (!document.body.classList.contains(_name)) {
                theme.enable(_name, true);
                return;
            }

            theme.disable();
        }

    }

}
