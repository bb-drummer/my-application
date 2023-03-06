'use strict';

let chromedriver = require('chromedriver');
let selenium = require('selenium-webdriver');
const chrome = require('selenium-webdriver/chrome');
const remote = require('selenium-webdriver/remote');
let server = {
    host: process.env?.TEST_SERVER ? process.env?.TEST_SERVER : '127.0.0.1',
    port: process.env?.TEST_PORT ? process.env?.TEST_PORT : '4444'
};

/**
 * Creates a Selenium WebDriver using Chrome as the browser
 * @returns {ThenableWebDriver} selenium web driver
 */
module.exports = function() {
/*
    let driver = new selenium.Builder()
        .forBrowser('chrome')
        .setChromeOptions(d)
    .usingServer(`http://${server.host}:${server.port}/wd/hub`)
    .build();

    driver.manage().window().maximize();
    */
    const driverOpts = new chrome.Options();
    const driverBuilder = new selenium.Builder()
        .forBrowser('chrome')
        .setChromeOptions(driverOpts)
        .usingServer(`http://${server.host}:${server.port}/wd/hub`)
    ;

    const driver = driverBuilder.build();
    driver.setFileDetector(new remote.FileDetector());

    driver.processCwd = process.cwd();

    return driver;
};