let Page = require('./Page.js')

class LoginPage extends Page {

  get name() { return 'login' }

  get elements() {
    return {
      ...this.commonElements,
      identifier : this.by.css("[data-test=page-zfcuser-zfcuser-login]"),
      login: {
        form : this.by.css("[data-test=form-zfcuser-login]"),
        error : this.by.css("[data-test=form-zfcuser-login] .has-error"),
        username : this.by.css("[data-test=form-input-login-username]"),
        password : this.by.css("[data-test=form-input-login-password]"),
        submit : this.by.css("[data-test=cta-form-login-submit]"),
        cancel : this.by.css("[data-test=cta-form-login-cancel]"),
        register : this.by.css("[data-test=cta-form-login-register]"),
        resetpassword : this.by.css("[data-test=cta-form-login-resetpassword]")
      }
    }
  }

  get url() {
    return this.basePath + "/user/login";
  }

  login (user, done) {
    this.log('login:', user);
        
    this.driver.findElement(this.elements.login.form).isDisplayed();
    if (user.username != '') {
      this.driver.findElement(this.elements.login.username).sendKeys(user.username);
    }
    if (user.password != '') {
      this.driver.findElement(this.elements.login.password).sendKeys(user.password);
    }
    this.driver.findElement(this.elements.login.submit).click();

    if (typeof done == 'function') {
      done();
    }
  }

}

module.exports = LoginPage
