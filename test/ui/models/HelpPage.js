let Page = require('./Page.js')

class HelpPage extends Page {

  get elements() {
    return {
      ...this.commonElements,
      identifier : this.by.css("[datatest=page-application-index-help]")
    }
  }

  get url() {
    return 'https://' + shared.data.hostnames[0] + "/index/help";
  }

}

module.exports = HelpPage
