let Page = require('./Page.js')

class HomePage extends Page {

  get name() { return 'homepage' }

  get elements() {
    return {
      ...this.commonElements,
      identifier : this.by.css("[data-test=page-application-index-index]")
    }
  }

  get url() {
    return this.basePath
  }

}

module.exports = HomePage
