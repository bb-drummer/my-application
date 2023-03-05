let Page = require('./Page.js')

class HomePage extends Page {

  get elements() {
    return {
      ...this.commonElements,
      identifier : this.by.css("[datatest=page-application-index-index]")
    }
  }

  get url() {
    return 'https://' + shared.data.hostnames[0] + "/";
  }

}

module.exports = HomePage
