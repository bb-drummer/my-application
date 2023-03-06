let Page = require('./Page.js')

class UserProfilePage extends Page {

  get name() { return 'user-profile' }

  get elements() {
    return {
      ...this.commonElements,
      identifier : this.by.css("[data-test=page-zfcuser-zfcuser-index]")
    }
  }

  get url() {
    return this.basePath + "/user";
  }

}

module.exports = UserProfilePage
