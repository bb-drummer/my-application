let Page = require('./Page.js')

class HomePage extends Page {

  get elements() {
    return {
      ...this.commonElements,
      identifier : by.id("introScreen")
    }
  }

  get url() {
    return 'https://' + shared.data.hostnames[0] + "/";
  }

}

module.exports = HomePage
