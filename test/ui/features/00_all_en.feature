# language: en
# encoding: utf-8
# ./features/00_all_en.feature

Feature: Show all pages
  All pages should display.
#Feature: Open homepage
#  The homepage should display.

  @development @staging @production
  Scenario: show homepage
    When the page "homepage" has been opened
    Then the page "homepage" has been displayed
    Then the element "header" on page "homepage" has been displayed
    Then the element "footer" on page "homepage" has been displayed
    Then the element "background" on page "homepage" has been displayed
    Then the element "analytics" on page "homepage" has been displayed
    Then the CTA "mailto" on page "homepage" has been displayed
    Then the CTA "twitter" on page "homepage" has been displayed
    Then the CTA "youtube" on page "homepage" has been displayed
    Then the CTA "linkedin" on page "homepage" has been displayed
    Then the CTA "xing" on page "homepage" has been displayed
    Then the CTA "gitlab" on page "homepage" has been displayed
    Then the CTA "legal" on page "homepage" has been displayed
    Then the CTA "derbongen" on page "homepage" has been displayed
    Then take a screenshot "test" of page "homepage"
    
#Feature: Show imprint page
#  The imprint page should display.

  @development @staging @production
  Scenario: show imprint
    When the page "homepage" has been opened
    When the CTA "legal" on page "homepage" has been triggered
    Then the page "imprint" has been displayed
    Then the element "footer" on page "imprint" has been displayed
    Then the element "navigation" on page "imprint" has been displayed
    Then the language selector "DE" on page "imprint" has been displayed
    Then the language selector "EN" on page "imprint" has been displayed
    Then the language selector "FR" on page "imprint" has been displayed
    Then the CTA "back" on page "imprint" has been displayed
    When the language "DE" on page "imprint" has been selected
    Then the language "DE" on page "imprint" has been displayed
    When the language "EN" on page "imprint" has been selected
    Then the language "EN" on page "imprint" has been displayed
    When the language "FR" on page "imprint" has been selected
    Then the language "FR" on page "imprint" has been displayed
    Then take a screenshot "test" of page "imprint"
    When the CTA "back" on page "imprint" has been triggered
    Then the page "homepage" has been displayed

#Feature: show error page
#  The error page should display if an invalid URL has been requested.

  @development @staging @production
  Scenario: show error page
    When the page "errorpage" has been opened
    Then the page "errorpage" has been displayed
    Then the element "header" on page "homepage" has been displayed
    Then the element "footer" on page "errorpage" has been displayed
    Then the element "background" on page "errorpage" has been displayed
    Then the element "broken glas" on page "errorpage" has been displayed
    Then take a screenshot "test" of page "errorpage"