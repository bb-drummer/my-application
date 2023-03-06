
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

    this.When(/the user tries to login with "([^"]*)"'s credentials$/, function (username, done) {
        const user = shared.data?.user[username];
        page['login'].login(user, done);
    })

    this.Given(/the user "([^"]*)" has logged in to the application$/, function (username) {
        const user = shared.data?.user[username];
        page['login'].go();
        page['login'].login(user);
        return driver.findElements(
            page['login']?.elements?.login.error
        ).length > 0;
    })

    this.Then(/^an error has been displayed on the page "login"$/, function () {
        return driver.findElement(
            page['login']?.elements?.login.error
        ).then(function (el) {
            return expect(el).to.exist;
        })
    });

    // ------

};