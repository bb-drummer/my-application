let Page = require('./Page.js')

class RegistrationPage extends Page {

  get elements() {
    return {
      ...this.commonElements,
      identifier : this.by.css("[datatest=page-zfuser-zfuser-register]")
    }
  }

  get url() {
    return 'https://' + shared.data.hostnames[0] + "/user/register";
  }

}

module.exports = RegistrationPage
