let Page = require('./Page.js')

class ResetPasswordPage extends Page {

  get elements() {
    return {
      ...this.commonElements,
      identifier : this.by.css("[datatest=page-zfc-zfcuser-requestpasswordreset]")
    }
  }

  get url() {
    return 'https://' + shared.data.hostnames[0] + "/requestpasswordreset";
  }

}

module.exports = HomePage
