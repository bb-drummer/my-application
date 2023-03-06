let {until, By} = require('selenium-webdriver')

let View = require('./View.js')

const fs = require('fs')

class Page extends View {

  get url() { return '' }

  get name() { return '' }

  get elements() {
    return {
      ...this.commonElements
    }
  }

  get commonElements() { 
    return {
      header: this.by.css('[data-test=layout-main-navigation]'),
      content: this.by.css('[data-test=layout-main-content]'),
      footer: this.by.css('[data-test=layout-main-footer]'),
      copyright: this.by.css('[data-test=layout-main-footer-copyright]'),
      appinfo: this.by.css('[data-test=layout-main-footer-appinfo]'),
      navigation: this.navigation.container,
      breadcrumbs: this.navigation.breadcrumbs,
      analytics: this.by.css('script[src*=matomo]'),
      lang: {
        de: {
          selector: this.by.css('label[for*=de]'),
          target: this.by.css('div[lang*=de]')
        },
        en: {
          selector: this.by.css('label[for*=en]'),
          target: this.by.css('div[lang*=en]')
        },
        fr: {
          selector : this.by.css('label[for*=fr]'),
          target : this.by.css('div[lang*=fr]')
        }
      }
    }
  }

  get navigation() { 
    return {
      container: this.by.css('[data-test=layout-main-navigation]'),
      breadcrumbs: this.by.css('[data-test=layout-breadcrumbs]'),
      paths: {
        'home': this.by.css('[data-test=cta-nav-home]'),
        'account/login': this.by.css('[data-test=cta-nav-account] + ul > li > [data-test=cta-nav-login]'),
        'account/logout': this.by.css('[data-test=cta-nav-account] + ul > li > [data-test=cta-nav-logout]'),
        'account/register': this.by.css('[data-test=cta-nav-account] + ul > li > [data-test=cta-nav-register]'),
        'account/reset-password': this.by.css('[data-test=cta-nav-account] + ul > li > [data-test=cta-nav-reset-password]'),
        'help/help': this.by.css('[data-test=cta-nav-help] + ul > li > [data-test=cta-nav-help]'),
        'help/support': this.by.css('[data-test=cta-nav-help] + ul > li > [data-test=cta-nav-support]'),
        'help/about': this.by.css('[data-test=cta-nav-help] + ul > li > [data-test=cta-nav-about]'),
      }
    }
  }

  navigate (navpath, pagename, idx) {
    const path = String(navpath).split('/');
    idx = (idx > 0 ? idx : 0);
    const $page = this;

    const querySelector = path
      .filter(function (v, i) {
        return i <= idx;
      })
      .map(function(v, i) { 
        return (i == 0 ? '[data-test=layout-main-navigation] > li > ' : ' + ul > li > ')
            + '[data-test=cta-nav-' + path[i] + ']';
      })
      .join('');

    let $result = this.driver.findElement(this.by.css(querySelector))
      .then(function (element) {
        //return $page.driver.executeScript("$('"+querySelector+"').trigger('mouseover')");
        return $page.driver.executeScript("document.querySelector('"+querySelector+"').dispatchEvent(new Event('mouseover'))");
      })
      .then(function (element) {
        return $page.driver.findElement($page.by.css(querySelector)).click();
      })
      .then(function () {
        return $page.screenshot('nav'+idx, pagename);
      });

    if ((path.length > 1) && (idx < (path.length-1))) {
      return $result
        .then(function () {
          return $page.navigate(navpath, pagename, idx+1);
        });
    } 

    return $result;
      
  }

  /*
   * go to this page
   *
   * @return {obj} a promise 
   */

  go () {
    const pageUrl = String(this.url).replace(/\/\//g, '/');
    this.log('url:', pageUrl);

    return driver.get(
      pageUrl
    );
  }

}

module.exports = Page
