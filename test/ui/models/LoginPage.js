let Page = require('./Page.js')

class LoginPage extends Page {

  get elements() {
    return {
      ...this.commonElements,
      identifier : this.by.css("[datatest=page-zfcuser-zfcuser-login]")
    }
  }

  get url() {
    return 'https://' + shared.data.hostnames[0] + "/user/login";
  }

}

module.exports = LoginPage
