# language: en
# encoding: utf-8
# ./features/00_basic.feature

@local @development @staging @production
Feature: Show all pages
  All public basic pages should display.
  The the basic layout should render correctly ohn each page.

  @pages @public
  Scenario Outline: open page "<pagename>"
    Given the page "<pagename>" has been opened
    And the page "<pagename>" has been displayed
    Then the element "header" on page "<pagename>" has been displayed
    Then the element "navigation" on page "<pagename>" has been displayed
    Then the element "breadcrumbs" on page "<pagename>" has been displayed
    Then the element "content" on page "<pagename>" has been displayed
    Then the element "footer" on page "<pagename>" has been displayed
    And the element "copyright" on page "<pagename>" has been displayed
    And the element "appinfo" on page "<pagename>" has been displayed
    Then take a screenshot "test" of page "<pagename>"

    Examples:
      | pagename |
      | homepage |
      | about |
      | support |
      | help |
      | register |
      | request-password-reset |
      | login |


  @pages @public
  Scenario Outline: open page "errorpage-404"
    Given the page "errorpage-404" has been opened
    And the page "errorpage-404" has been displayed
    Then the element "header" on page "errorpage-404" has been displayed
    Then the element "content" on page "errorpage-404" has been displayed
    Then the element "footer" on page "errorpage-404" has been displayed
    And the element "copyright" on page "errorpage-404" has been displayed
    And the element "appinfo" on page "errorpage-404" has been displayed
    Then the element "navigation" on page "errorpage-404" has been displayed
    Then take a screenshot "test" of page "errorpage-404"

    Examples:
      | test |
      | -- |