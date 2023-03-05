let Page = require('./Page.js')

class SupportPage extends Page {

  get elements() {
    return {
      ...this.commonElements,
      identifier : this.by.css("[datatest=page-application-index-support]")
    }
  }

  get url() {
    return 'https://' + shared.data.hostnames[0] + "/application/index/support.html";
  }

}

module.exports = SupportPage
