let Page = require('./Page.js')

class UserProfilePage extends Page {

  get elements() {
    return {
      ...this.commonElements,
      identifier : this.by.css("[datatest=page-zfcuser-zfcuser-index]")
    }
  }

  get url() {
    return 'https://' + shared.data.hostnames[0] + "/user";
  }

}

module.exports = UserProfilePage
