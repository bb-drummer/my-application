let Page = require('./Page.js')

class ImprintPage extends Page {

  get elements() {
    return {
      ...this.commonElements,
      identifier : by.css(".legal"),
      navigation : by.css('.legal-menu')
    }
  }

  get url() {
    return 'https://' + shared.data.hostnames[0] + "/legal.html";
  }

}

module.exports = ImprintPage
