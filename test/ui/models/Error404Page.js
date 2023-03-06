let Page = require('./Page.js')

class Error404Page extends Page {

  get name() { return 'error-404' }

  get elements() {
    return {
      ...this.commonElements,
      identifier : by.css("[data-test=page-error-404]")
    }
  }

  get url() {
    return this.basePath + "/page-not-found";
  }

}

module.exports = Error404Page
