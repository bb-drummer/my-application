const {until, By} = require('selenium-webdriver')
const moment = require('moment')

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
    this.time = Date.now();
  }

  /**
   * global `WebDriver` instance
   * 
   * @returns {string}
   */
  get driver() { return driver }

  /**
   * global `By` instancve
   * 
   * @returns {By}
   */
  get by() { return by }

  /**
   * language setting
   * 
   * @returns {string}
   */
  get language() { return this.config?.lang }

  /**
   * theme name
   * 
   * @returns {string}
   */
  get theme() { return this.config?.theme }

  /**
   * browser name
   * 
   * @returns {string}
   */
  get browser() { return this.config?.browser }

  /**
   * debug/log mode
   * 
   * @returns {string}
   */
  get debug() { return (this.config?.debug === 'true') }

  /**
   * environment test configuration
   * 
   * @returns {string}
   */
  get config() { return global.ViewConfig || {} }

  /**
   * test site's URL base path
   * 
   * @returns {string}
   */
  get basePath() {
    const host = shared.data.hostnames[0];
    let basePath = 'https://' + host + "/" + this.language + "/";
    if (String(host).startsWith('http')) {
      basePath = host + "/" + this.language + "/";
    }
    return basePath;
  }

  /**
   * check if the page is the current page
   *
   * @method exist 
   *
   * @returns {object} a promise
   */
  exist() {
    return this.waitAndLocate(this.elements?.identifier, 5 * 1000)
  }

  /**
   * click an element
   *
   * @method click
   *
   * @param {string|object} can be the elementId defined in elements getter method or a selector. if no element is mapped, the method will treat it as a selector 
   *
   * @returns {object} a promise 
   */
  click(elementId) {
    let element = this.elements[elementId];
    element = element ? element : elementId;

    return this.driver.findElement(element).then(function(element) {
      return element.click();
    });
  }

  /**
   * click an element
   *
   * @method waitAndLocate 
   *
   * @param {string|object} can be the elementId defined in elements getter method or a selector. if no element is mapped, the method will treat it as a selector 
   *
   * @returns {object} a promise 
   */
  waitAndLocate(elementId, timeout = 5000) {
    let element = this.elements[elementId];
    element = element ? element : elementId;
    const condition = until.elementLocated(element);

    return this.driver.wait(condition, timeout); 
  }

  waitForAlert(text, timeout = 5000) {
    const condition = until.alertIsPresent();

    return this.driver.wait(condition, timeout)
      .then( () => {
        const alertBox = driver.switchTo().alert();
        alertText = alertBox.getText();
      })
  }

  waitAndFill(elementId, value, timeout = 5000) {
    return this.waitAndLocate(elementId, timeout).sendKeys(value);
  } 

  get screenshotFilePath() {
    return driver.processCwd + '/report/images/'
  }

  get screenshotFileTime() {
    const now = new Date();
    return moment(now).format('YYYYMMDDHHmmssSSS');
    //return String(this.time).padStart(7, '0');
  }

  screenshot(screenname, pagename) {
    const filename = this.screenshotFileTime
      + '_' + pagename 
      + '_' + screenname 
      + '_' + this.language 
      + '_' + this.browser;
    const imageFilename = this.screenshotFilePath + filename;

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
      console.log('[', ...arguments, ']');
    }
  }
 
  get time() {
    if (this.timeframeStart) {
      return Date.now() - this.timeframeStart;
    }

    return 0;
  }

  set time(start) {
    this.timeframeStart = start;
  }

}

module.exports = View
