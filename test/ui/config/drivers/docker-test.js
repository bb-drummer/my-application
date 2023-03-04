'use strict';

const chromedriver = require('chromedriver');
const selenium = require('selenium-webdriver');
const remote = require('selenium-webdriver/remote');
const server = {
    host: process.env?.TEST_SERVER ? process.env?.TEST_SERVER : 'host.docker.internal',
    port: process.env?.TEST_PORT ? process.env?.TEST_PORT : '4444'
};

/**
 * Creates a Selenium WebDriver to TEST_SERVER using TEST_BROWSER_NAME as the browser
 * @returns {ThenableWebDriver} selenium web driver
 */
module.exports = function() {

    console.log('browser', process.env?.TEST_CLIENT);

    var driver = new selenium
        .Builder()
        .withCapabilities({
            browserName: process.env?.TEST_CLIENT ? process.env?.TEST_CLIENT : 'chrome',
            acceptSslCerts: true
        })
        .usingServer(`http://${server.host}:${server.port}/wd/hub`)
        .build();

    driver.setFileDetector(new remote.FileDetector());
    
    driver
        .manage()
        .window()
        .maximize();

    driver.processCwd = process.cwd();

    return driver;
};