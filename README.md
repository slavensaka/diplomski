# My master thesis work


## Subject 
Title of this graduation work was "Creation of a web interface for a self-adaptive online test generator"
## Content
1. Theoretical bases of conducting tests
2. Theoretical basis of technologies used
3. Description of created Internet application

## Install

Download zip file or git pull the project then

``` bash
$ composer install
```
Then create .env in root folder add something similar
```
APP_ENV=local
APP_DEBUG=true
APP_KEY=SomeRandomString

DB_HOST=localhost
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret

CACHE_DRIVER=file
SESSION_DRIVER=file

```
Then
``` bash
$ php artisan server
```
Or use Laravel homestead pre-packed box instead 
Or other means of serving laravel.

## Written Thesis can be found here
[PDF](https://www.scribd.com/doc/272701930/Diplomski-rad-graduation-thesis-Web-interface-for-a-self-adaptive-online-test-generator "PDF")

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
#### True-false 

 ![truefalse](http://s12.postimg.org/mjpbmvq9p/true.png "truefalse")
#### Multiple response 

![response](http://s12.postimg.org/jztoss2pp/response.png "response")
#### Multiple choice 

![choice](http://s12.postimg.org/ecxbvb071/choice.png "choice")
#### Fill-in

![fill](http://s12.postimg.org/en4uenet9/fill.png "fill")

## Form for creating a new test

![crete](http://s12.postimg.org/ble24p1od/create.png "create")

## Form for updating the test

![test](http://s12.postimg.org/gy2witpkt/editt.png "test")
## Form for updating Q & A

![question](http://s12.postimg.org/5zrn0n0zh/editq.png "question")

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
