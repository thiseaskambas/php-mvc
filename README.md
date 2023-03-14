# php-mvc

A PHP MVC framework

Details :

The .htaccess file with the mod_rewrite rules is responsible for redirecting all requests to the index.php file, which then initializes the Core object and handles the request based on the URL parameters passed in the url query string parameter.

This allows the Core object to handle all requests, not just one, and dynamically load the appropriate controller and method based on the URL parameters.
