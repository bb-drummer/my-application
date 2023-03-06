let Page = require('./Page.js')

class ErrorPage extends Page {

  get name() { return 'error-50x' }

  get elements() {
    return {
      ...this.commonElements,
      identifier : by.css("[data-test=page-error-50x]")
    }
  }

  get url() {
    return this.basePath + "/some-error";
  }

}

module.exports = ErrorPage
