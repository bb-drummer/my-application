let Page = require('./Page.js')

class HelpPage extends Page {

  get name() { return 'help' }

  get elements() {
    return {
      ...this.commonElements,
      identifier : this.by.css("[data-test=page-application-index-help]")
    }
  }

  get url() {
    return this.basePath + "/application/index/help";
  }

}

module.exports = HelpPage
