
module.exports = function () {
/*
    // add a before feature hook
    this.BeforeFeature(function(feature, done) {
        //console.log('BeforeFeature: ' + feature.getName());
        done();
    });

    // add an after feature hook
    this.AfterFeature(function(feature, done) {
        //console.log('AfterFeature: ' + feature.getName());
        done();
    });

    // add before scenario hook
    this.BeforeScenario(function(scenario, done) {
        //console.log('BeforeScenario: ' + scenario.getName());
        done();
    });

    // add after scenario hook
    this.AfterScenario(function(scenario, done) {
        //console.log('AfterScenario: ' + scenario.getName());
        done();
    });
*/
    // ------

    this.When(/the URL "([^"]*)" has been opened$/, function (pageurl) {
        return driver.get(pageurl);
    });

    this.When(/the page "([^"]*)" has been opened$/, function (pagename) {
        return page[pagename].go();
    });

    this.Then(/^the page "([^"]*)" has been displayed$/, function (pagename) {
        return driver.findElement(
            page[pagename]?.elements?.identifier
        ).then(function (el) {
            return expect(el).to.exist;
        })
    });

    // ------

    this.When(/the CTA "([^"]*)" on page "([^"]*)" has been triggered$/, function (cta, pagename) {
        return driver.findElement(
            (page[pagename]?.elements?.cta && page[pagename]?.elements?.cta[cta]) 
                ? page[pagename].elements?.cta[cta] 
                : by.css('a[href*='+ String(cta).toLowerCase()+']')
        ).then(function (el) {
            return el.click();
        })
    });

    this.Then(/the CTA "([^"]*)" on page "([^"]*)" has been displayed$/, function (cta, pagename) {
        return driver.findElement(
            (page[pagename]?.elements?.cta && page[pagename]?.elements?.cta[cta]) 
                ? page[pagename].elements?.cta[cta] 
                : by.css('a[href*='+ String(cta).toLowerCase()+']')
        ).then(function (el) {
            return expect(el).to.exist;
        })
    });

    // ------

    this.Then(/the language selector "([^"]*)" on page "([^"]*)" has been displayed$/, function (language, pagename) {
        return driver.findElement(
            page[pagename]?.elements?.lang[String(language).toLowerCase()].selector
        ).then(function (el) {
            return expect(el).to.exist;
        })
    });

    this.When(/the language "([^"]*)" on page "([^"]*)" has been selected$/, function (language, pagename) {
        return driver.findElement(
            page[pagename]?.elements?.lang[String(language).toLowerCase()].selector
        ).then(function (el) {
            return el.click();
        })
    });

    this.Then(/the language "([^"]*)" on page "([^"]*)" has been displayed$/, function (language, pagename) {
        return driver.findElement(
            page[pagename]?.elements?.lang[String(language).toLowerCase()].target
        ).isDisplayed()
    });

    // ------

    this.Then(/the element "([^"]*)" on page "([^"]*)" has been displayed$/, function (elementname, pagename) {
        return driver.findElement(
            page[pagename]?.elements[elementname]
        ).then(function (el) {
            return expect(el).to.exist;
        })
    });

    this.Then(/take a screenshot "([^"]*)" of page "([^"]*)"$/, function (filename, pagename, done) {
        page[pagename].screenshot(filename, pagename);
        done();
    });

    // ------

    this.Given(/the user navigates via "([^"]*)" to the "([^"]*)" page$/, function (navpath, pagename, done) {
        page['homepage'].go();
        page['homepage'].navigate(navpath, pagename);
        page[pagename].waitAndLocate(page[pagename].elements.identifier);
        
        page[pagename]?.screenshot(
            (String(navpath).replace(/\//g, '_')), pagename
        );
        driver.findElement(page[pagename].elements.identifier).isDisplayed();

        done();
    })

};