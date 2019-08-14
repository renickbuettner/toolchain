export class i18n {

    constructor() {
        this.static = {
            'dialog.cancel': 'Cancel',
            'dialog.confirm': 'Confirm',
            'actions.delete.info': 'Do you really want to delete this?',
            'actions.delete.item': 'Delete item'
        };
    }

    getString(key) {
        return window.tc.i18n.static[key];
    }

}
