const Page = require('../../page_objects/page');
const assert = require('assert');
let page = new Page;

describe('login page', function() {
    it('should not allow an anonymous user with wrong credentials to login', () => {
        page.visit('/user/login');
        $('#edit-name').waitForExist();
        $('#edit-name').setValue('wrong-name');
        $('#edit-pass').setValue('wrong-pass');
        $('#edit-submit').click();

        $('.messages--error div[role="alert"]').waitForExist();
        assert.equal($('.messages--error div[role="alert"]').getText(), 'Error message\nUnrecognized username or password. Forgot your password?');
    });

});
