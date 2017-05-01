# Objective PHP / Starter Kit

## Project topic

Typical Objective PHP project arborescence, with minimal workflow and configuration implementation.

This is where to start your own Objective PHP project.

## How to make it work

A few simple steps are needed to get this application up and running:

### The next step assumes that composer is available in your PATH

```
# install the project and its dependencies
composer create-project -s dev objective-php/starter-kit [project-name]
cd [project-name]

# run a local web server
php -S localhost:8001 -t public 
```

You can then open http://localhost:8001 to access your brand new project. Note that the framework will show itself much more efficient when using a production grade web server (as Apache or Nginx), while the PHP built-in server will allow you to make the starter kit running within seconds.

## Doctrine support

### Doctrine Package activation
The starter-kit comes with sample Doctrine support. This setup has to be activated by plugging the Doctrine Package in the Application. 
This can be done by simply uncommenting the corresponding line in the `Application::importPackages()` method (in `app/src/Application.php`).  

### Doctrine CLI
To run the native Doctrine CLI console you may are used to, it has to be wrapped 
with Objective PHP init sequence. So, please trigger the console tool by running:

```
vendor/bin/op doctrine
```

and **not** `vendor/bin/doctrine`.

### Doctrine configuration
You should also adapt the `app/config/doctrine.php` configuration file to reflect your own setup, not to forget that you also
can override any config file by creating a local version of it (like `app/config/doctrine.local.php`).

