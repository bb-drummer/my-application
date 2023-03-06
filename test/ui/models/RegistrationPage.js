let Page = require('./Page.js')

class RegistrationPage extends Page {

  get name() { return 'register' }

  get elements() {
    return {
      ...this.commonElements,
      identifier : this.by.css("[data-test=page-zfcuser-zfcuser-register]")
    }
  }

  get url() {
    return this.basePath + "/user/register";
  }

}

module.exports = RegistrationPage
