let Page = require('./Page.js')

class ResetPasswordPage extends Page {

  get name() { return 'reset-password' }

  get elements() {
    return {
      ...this.commonElements,
      identifier : this.by.css("[data-test=page-zfcuser-zfcuser-requestpasswordreset]")
    }
  }

  get url() {
    return this.basePath + "/requestpasswordreset";
  }

}

module.exports = ResetPasswordPage
