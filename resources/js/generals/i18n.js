export class i18n {

    constructor() {
        this.static = {
            'dialog.cancel': 'Cancel',
            'dialog.confirm': 'Confirm',
            'actions.delete.info': 'Do you really want to delete this?',
            'actions.delete.item': 'Delete item',
            'editor.invalid.title': 'Invalid content',
            'editor.invalid.hide': 'Hide',
            'editor.invalid.info': 'The form contains invalid input. The areas are highlighted. A title can contain words with spaces. A category can contain out of words and <em>_-</em>.'
        };
    }

    getString(key) {
        return window.tc.i18n.static[key];
    }

}
