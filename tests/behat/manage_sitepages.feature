@local @local_sitepages
Feature: Manage site pages
  In order to publish custom site pages
  As an administrator
  I need to create and open a site page

  @javascript
  Scenario: Admin creates a site page with the Moodle editor
    Given I log in as "admin"
    And I am on "/local/sitepages/index.php"
    And I press "Add page"
    And I set the following fields to these values:
      | Page name | Welcome page |
      | URL slug  | welcome      |
    And I press "Save changes"
    Then I should see "Welcome page"
    And I should see "welcome"
    When I follow "View"
    Then I should see "Welcome page"
