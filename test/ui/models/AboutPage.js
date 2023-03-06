let Page = require('./Page.js')

class AboutPage extends Page {

  get name() { return 'about' }

  get elements() {
    return {
      ...this.commonElements,
      identifier : this.by.css("[data-test=page-application-index-about]")
    }
  }

  get url() {
    return this.basePath + "/application/index/about";
  }

}

module.exports = AboutPage
