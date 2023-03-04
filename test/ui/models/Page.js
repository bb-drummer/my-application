let {until, By} = require('selenium-webdriver')

let View = require('./View.js')

const fs = require('fs')

class Page extends View {

  get url() { return '' }

  get commonElements() { 
    return {
      header: by.css('header'),
      footer: by.css('#footer'),
      background: by.css('#bg'),
      analytics: by.css('script[src*=matomo]'),
      lang : {
        de : {
          selector : by.css('label[for*=de]'),
          target : by.css('div[lang*=de]')
        },
        en : {
          selector : by.css('label[for*=en]'),
          target : by.css('div[lang*=en]')
        },
        fr : {
          selector : by.css('label[for*=fr]'),
          target : by.css('div[lang*=fr]')
        }
      }
    }
  }

  /*
   * go to this page
   *
   * @return {obj} a promise 
   */

  go () {
    return driver.get(this.url)
  }

  get screenshotFilepath() { return driver.processCwd + '/report/images' }

  screenshot (filename, pagename) {
    const imageFilename = this.screenshotFilepath + '/' + pagename + '_' + filename + '.png';

    return driver.takeScreenshot().then(
      function(image) {
          fs.writeFileSync(imageFilename, image, 'base64');
      }
    );
  }

}

module.exports = Page
