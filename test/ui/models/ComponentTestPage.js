let Page = require('./Page.js')

class ComponentsTestPage extends Page {

  get name() { return 'component-test' }

  get elements() {
    return {
      ...this.commonElements,
      identifier : this.by.css("[data-test=page-uicomponents-components-index]")
    }
  }

  get url() {
    return this.basePath + '/uicomponents-testpages';
  }

}

module.exports = ComponentsTestPage
