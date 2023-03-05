
module.exports = function () {

    this.When(/^die URL "([^"]*)" aufgerufen wird$/, function (pageurl) {
        return driver.get(pageurl);
    });

    this.When(/^die Seite "([^"]*)" aufgerufen wird$/, function (pagename) {
        return page[pagename].go();
    });

    this.Then(/^wird die Seite "([^"]*)" angezeigt$/, function (pagename) {
        return driver.findElement(
            page[pagename]?.elements?.identifier
        ).then(function (el) {
            return expect(el).to.exist;
        })
    });

    // ------

    this.When(/^der CTA "([^"]*)" auf der Seite "([^"]*)" ausgelösst wird$/, function (cta, pagename) {
        return driver.findElement(
            (page[pagename]?.elements?.cta && page[pagename]?.elements?.cta[cta]) 
                ? page[pagename].elements?.cta[cta] 
                : by.css('a[href*='+ String(cta).toLowerCase()+']')
        ).then(function (el) {
            return el.click();
        })
    });

    this.Then(/^wird der CTA "([^"]*)" auf der Seite "([^"]*)" angezeigt$/, function (cta, pagename) {
        return driver.findElement(
            (page[pagename]?.elements?.cta && page[pagename]?.elements?.cta[cta]) 
                ? page[pagename].elements?.cta[cta] 
                : by.css('a[href*='+ String(cta).toLowerCase()+']')
        ).then(function (el) {
            return expect(el).to.exist;
        })
    });

    // ------

    this.Then(/^wird die Sprachauswahl "([^"]*)" auf der Seite "([^"]*)" angezeigt/, function (language, pagename) {
        return driver.findElement(
            page[pagename]?.elements?.lang[String(language).toLowerCase()].selector
        ).then(function (el) {
            return expect(el).to.exist;
        })
    });

    this.When(/^die Sprache "([^"]*)" auf der Seite "([^"]*)" ausgewählt wird$/, function (language, pagename) {
        return driver.findElement(
            page[pagename]?.elements?.lang[String(language).toLowerCase()].selector
        ).then(function (el) {
            return el.click();
        })
    });

    this.Then(/^wird die Sprache "([^"]*)" auf der Seite "([^"]*)" angezeigt$/, function (language, pagename) {
        return driver.findElement(
            page[pagename]?.elements?.lang[String(language).toLowerCase()].target
        ).isDisplayed()
    });

    // ------

    this.Then(/^wird das Element "([^"]*)" auf der Seite "([^"]*)" angezeigt$/, function (elementname, pagename) {
        return driver.findElement(
            page[pagename]?.elements[elementname]
        ).then(function (el) {
            return expect(el).to.exist;
        })
    });

    this.Then(/^wird ein Screenshot "([^"]*)" von der Seite "([^"]*)" gespeichert$/, function (filename, pagename) {
        return page[pagename]?.screenshot(filename, pagename);
    });

};