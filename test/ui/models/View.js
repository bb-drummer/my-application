let {until, By} = require('selenium-webdriver')

global.ViewSetup = {
  theme: ViewSetup?.theme 
    ? ViewSetup.theme 
    : (process.env?.TEST_THEME ? process.env?.TEST_THEME : 'bootstrap'),
  lang: ViewSetup?.lang 
    ? ViewSetup.lang 
    : (process.env?.TEST_LANG ? process.env?.TEST_LANG : 'de'),
  lang: ViewSetup?.browser 
    ? ViewSetup.browser 
    : (process.env?.TEST_CLIENT ? process.env?.TEST_CLIENT : 'chrome')
}
class View {

  constructor(driver) {

    this.driver = driver

  }

  get by() { return by }

  get elements() { return { } }

  get language() { return ViewSetup.lang }

  get theme() { return ViewSetup.theme }

  get browser() { return ViewSetup.browser }

  get basePath() {
    const host = shared.data.hostnames[0];
    if (String(host).startsWith('http')) {
      return host + "/" + this.language + "/";
    }
    return 'https://' + host + "/" + this.language + "/";
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

    console.log(element);
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

  snapShot(filename) {

    return this.driver.takeScreenshot()
      .then(function(image) {
        require('fs').writeFile(`${filename}.png`, image, 'base64', function(err) {
          if (err) { console.log(err); }
        });
      }); 
 
  }

}

module.exports = View 
