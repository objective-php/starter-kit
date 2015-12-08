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




