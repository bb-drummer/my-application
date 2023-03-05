let Page = require('./Page.js')

class AboutPage extends Page {

  get elements() {
    return {
      ...this.commonElements,
      identifier : this.by.css("[datatest=page-application-index-about]")
    }
  }

  get url() {
    return 'https://' + shared.data.hostnames[0] + "/application/index/about";
  }

}

module.exports = AboutPage
