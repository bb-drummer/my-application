
const hostnames = require('../../../../hostnames.json');
console.log('hostnames', hostnames);

module.exports = {
    hostnames,
    user: {
        'sysadmin' : {
            username: 'sysadmin',
            password: 'sysadmin'
        },
        'test-user' : {
            username: 'testuser',
            password: 'test1234'
        },
        'wrong-password-user' : {
            username: 'testuser',
            password: '1234test'
        },
        'no-password-user' : {
            username: 'testuser',
            password: ''
        },
        'not-existing-user' : {
            username: 'nouser',
            password: ''
        },
        'empty-user' : {
            username: '',
            password: ''
        },
    }
};