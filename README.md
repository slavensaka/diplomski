# My master thesis work

## Subject 
Title of this graduation work was "Creation of a web interface for a self-adaptive online test generator"
## Content
1. Theoretical bases of conducting tests
2. Theoretical basis of technologies used
3. Description of created Internet application

## The application is available online
[AutoGenerateMe](http://autogenerate.me "Autogenerate Me")

## Goal  
To create a platform with the possibility of user authentication with the creation and implementation of less formal examinations of knowledge so-called mini-tests, tests for the more formal needs for assessment of students, and creating quizzes and polls.

## Use-case diagram:
![use case](http://s24.postimg.org/3mzafvpz9/usecase.png "use case")

The diagram show the roles of participants in the web application. The end user has the possibility of taking the tests that have been set as a public that is available without a password. After the end-user tries a mini test, a account is generated  with a password and random name, where then can authorize as a student and have all aspects of the student role. The student has a complete overview of tests passed so far, a quick search by name of the test and tag. There is the possibility of taking the test. The teacher has the additional role of creating, updating tests, and insight of students who took some of his created tests, and the ability to copy the entire test on his panels created by other teachers and are posted publicly.

## Web tehnologies used in this graduation thesis were
+ Programming languages: PHP 5.5, Javascript
+ Developer Framework: Laravel 5
+ Web server: Apache
+ Development environment: Homestead
+ Database: MySQL 5.6
+ The design of the user interface: Bootstrap
+ Language template: Blade template engine



## Database scheme
![baza](http://s24.postimg.org/jwpgis0n9/baza.png "baza")

+ student-test, user-test, test-tags = many-to many-relations
+ answer-questions = one-to-many relations

Tags can be assigned to more tests, and more tests may be allocated tags. Additional tables called the pivot table that serve as intermediate tables that link the two models defined by the relation many to many are shown. 

## Type of questions 
+ True-false 
+ Multiple response 
+ Multiple choice 
+ Fill-in



