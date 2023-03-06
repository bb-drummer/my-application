# language: en
# encoding: utf-8
# ./features/01_login.feature

@local @development @staging @production
Feature: users logging in
  Enable users to register and login to the application.


  @login @public @user @admin
  Scenario Outline: user is logging in successfully
    Given the user navigates via "account/login" to the "login" page
    And the page "login" has been displayed
    And the user tries to login with "sysadmin"'s credentials
    Then take a screenshot "after-login" of page "login"
    Then the page "user-profile" has been displayed

    Examples:
      | test |
      | -- |


  @login @private @user @errors
  Scenario Outline: user is logging out successfully
    Given the user "sysadmin" has logged in to the application
    And the page "user-profile" has been displayed
    Then the user navigates via "account/logout" to the "homepage" page
    Then take a screenshot "after-logout" of page "login"
    Then the page "homepage" has been displayed

    Examples:
      | test |
      | -- |


  @login @public @user @errors
  Scenario Outline: user is logging with "<title>"
    Given the user navigates via "account/login" to the "login" page
    And the page "login" has been displayed
    And the user tries to login with "<user>"'s credentials
    Then take a screenshot "after-<test>" of page "login"
    Then the page "login" has been displayed
    And an error has been displayed on the page "login"

    Examples:
      | title | user | test |
      | wrong credentials | wrong-password-user | wrong-password |
      | no password | no-password-user | no-password |
      | no credentials | empty-user | no-credentials |