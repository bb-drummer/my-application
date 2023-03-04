let Page = require('./Page.js')

class ErrorPage extends Page {

  get elements() {
    return {
      ...this.commonElements,
      identifier : by.css(".errorpage"),
      'broken glas' : by.css("div[class*=shatter]")
    }
  }

  get url() {
    return 'https://' + shared.data.hostnames[0] + "/some-error";
  }

}

module.exports = ErrorPage
