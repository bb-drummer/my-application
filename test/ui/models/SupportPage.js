let Page = require('./Page.js')

class SupportPage extends Page {

  get name() { return 'support' }

  get elements() {
    return {
      ...this.commonElements,
      identifier : this.by.css("[data-test=page-application-index-support]")
    }
  }

  get url() {
    return this.basePath + "/application/index/support";
  }

}

module.exports = SupportPage
