let {until, By} = require('selenium-webdriver')

global.ViewConfig = {
  theme: global.ViewConfig?.theme 
    ? global.ViewConfig?.theme 
    : String(process.env?.TEST_THEME ? process.env?.TEST_THEME : 'bootstrap').toLowerCase(),
  lang: global.ViewConfig?.lang 
    ? global.ViewConfig?.lang 
    : String(process.env?.TEST_LANG ? process.env?.TEST_LANG : 'de').toLowerCase(),
  browser: global.ViewConfig?.browser 
    ? global.ViewConfig?.browser 
    : String(process.env?.TEST_CLIENT ? process.env?.TEST_CLIENT : 'chrome').toLowerCase(),
  debug: global.ViewConfig?.debug 
    ? global.ViewConfig?.debug 
    : String(process.env?.TEST_DEBUG ? process.env?.TEST_DEBUG : 'false').toLowerCase()
}
class View {

  constructor(options) {

  }

  get driver() { return driver }

  get by() { return by }

  get elements() { return { } }

  get language() { return this.config?.lang }

  get theme() { return this.config?.theme }

  get browser() { return this.config?.browser }

  get debug() { return (this.config?.debug === 'true') }

  get config() { return global.ViewConfig || {} }

  get basePath() {
    const host = shared.data.hostnames[0];
    let basePath = 'https://' + host + "/" + this.language + "/";
    if (String(host).startsWith('http')) {
      basePath = host + "/" + this.language + "/";
    }
    return basePath;
  }

  /* check if the page is the current page
   * TO BE OVERRIDED
   *
   * @method exist 
   *
   * @return {object} a promise
   */

  exist() {
  
    return this.waitAndLocate('id', 5 * 1000)
  
  }

  /*
   * click an element
   *
   * @method click
   *
   * @params {string / object} can be the elementId defined in elements getter method or a selector. if no element is mapped, the method will treat it as a selector 
   *
   * @return {obj} a promise 
   */

  click(elementId) {

    let element = this.elements[elementId]
    element = element ? element : elementId

    return this.driver.findElement(element).then(function(element) {

      return element.click();

    });
  
  }

  /*
   * click an element
   *
   * @method waitAndLocate 
   *
   * @params {string / object} can be the elementId defined in elements getter method or a selector. if no element is mapped, the method will treat it as a selector 
   *
   * @return {obj} a promise 
   */


  waitAndLocate(elementId, timeout = 5000) {

    let element = this.elements[elementId]

    element = element ? element : elementId

    //console.log(element);
    var condition = until.elementLocated(element);

    return this.driver.wait(condition, timeout); 

  }

  waitForAlert(text, timeout = 5000) {

    var condition = until.alertIsPresent();

    return this.driver.wait(condition, timeout)
      .then( () => {
      
        let alertBox = driver.switchTo().alert()
        alertText = alertBox.getText();

      })

  }

  waitAndFill(elementId, value, timeout = 5000) {

    return this.waitAndLocate(elementId, timeout).sendKeys(value)
  
  } 

  get screenshotFilepath() { return driver.processCwd + '/report/images/' }

  screenshot(screenname, pagename) {
    const filename = pagename + '_' + screenname + '_' + this.language + '_' + this.browser;
    const imageFilename = this.screenshotFilepath + filename;

    return this.snapShot(imageFilename);
  }

  snapShot(filename) {
    const $this = this;
    return this.driver.takeScreenshot()
      .then(function(image) {
        $this.log('snapshot:-file', String(filename).replace(process.cwd()+"/", ''));
        return require('fs').writeFile(`${filename}.png`, image, 'base64', function(err) {
          if (err) { $this.log('ERROR:', err); }
        });
      }); 
 
  }

  log () {
    //console.log('[ debug ' + this.name + ':', this.config?.debug, process.env?.TEST_DEBUG, ']')
    if (this.config?.debug === 'true') {
      console.log('[', ...arguments, ']')
    }
  }

}

module.exports = View 
