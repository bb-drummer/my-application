module.exports = function () {

    this.When(/^ich die URL "([^"]*)" öffne$/, function (url) {
        return driver.get(url);
    });

    this.When(/^ich den "([^"]*)" Link öffne$/, function (linkpage) {
        return driver.findElement(
            by.css('a[href*='+ String(linkpage).toLowerCase()+']')
        ).then(function (el) {
            return el.click();
        })
    });

    this.Then(/^bin ich auf der Startseite$/, function () {
        return driver.findElement(By.id("introScreen")).then(function (el) {
            return expect(el).to.exist;
        })
    });

    this.Then(/^wird der "([^"]*)" Link gezeigt$/, function (linkpage) {
        return driver.findElement(
            by.css('a[href*='+ String(linkpage).toLowerCase()+']')
        ).then(function (el) {
            return expect(el).to.exist;
        })
    });

    this.Then(/^wird die "([^"]*)" Sprachauswahl gezeigt$/, function (linkpage) {
        return driver.findElement(
            by.css('label[for*='+ String(linkpage).toLowerCase()+']')
        ).then(function (el) {
            return expect(el).to.exist;
        })
    });

    this.When(/^ich die Sprache "([^"]*)" wähle$/, function (linkpage) {
        return driver.findElement(
            by.css('label[for*='+ String(linkpage).toLowerCase()+']')
        ).then(function (el) {
            return el.click();
        })
    });

    this.Then(/^wird die Sprache "([^"]*)" gezeigt$/, function (linkpage) {
        return driver.findElement(
            by.css('div[lang*='+ String(linkpage).toLowerCase()+']')
        ).isDisplayed()
    });

    // ------

    this.Then(/^bin ich auf der Impressumseite$/, function () {
        return driver.findElement(by.css('.legal')).then(function (el) {
            return expect(el).to.exist;
        })
    });

    this.Then(/^wird die Navigation auf der Impressumseite gezeigt$/, function () {
        return driver.findElement(by.css('.legal-menu')).then(function (el) {
            return expect(el).to.exist;
        })
    });

    // ------

    this.Then(/^bin ich auf der Fehlerseite$/, function () {
        return driver.findElement(by.css(".errorpage")).then(function (el) {
            return expect(el).to.exist;
        })
    });

    this.Then(/^wird kaputtes Glas gezeigt \((\d+)\)$/, function (shatter) {
        return driver.findElement(
            by.css('.shatter'+shatter)
        ).then(function (el) {
            return expect(el).to.exist;
        })
    });

    // ------

    this.Then(/^wird der Footer gezeigt$/, function () {
        return driver.findElement(By.id("footer")).then(function (el) {
            return expect(el).to.exist;
        })
    });

    this.Then(/^wird der Hintergrund gezeigt$/, function () {
        return driver.findElement(By.id("bg")).then(function (el) {
            return expect(el).to.exist;
        })
    });

    this.Then(/^wird das Analytics Script generiert$/, function () {
        return driver.findElement(by.css("script[src*=matomo]")).then(function (el) {
            return expect(el).to.exist;
        })
    });

};