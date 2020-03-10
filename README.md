# wark

This is a very lightweight mvc

Why another framework?
----------------------
The intention is to create a very simple MVC framework that is the bare minimum to be able to create
simple apps and apis.  PHP can be incredibly fast, and the purpose was to have a simple scaffolding
for people to create their applications with out the hassle of over complication.

This has been tested with PHP 7.4 - it should be downward compatible, but we're aiming for 7.4.

to get it up and running 

`composer install`

in the public directory 

`php -S localhost:5678`

Routes are as follows 

`?route=controller/method/var`

So the framework will look for the controller method and then pass any variable.

you can also edit the `src/app/routes.php` file for any routes you want to break out of the pattern above.

Over time we will add to this framework.
