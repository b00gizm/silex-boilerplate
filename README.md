Silex Boilerplate
=================

Your starting point for developing awesome web apps with the [Silex
Framework](http://silex.sensiolabs.org/) and [HTML5 Boilerplate](http://html5boilerplate.com/). It's almost vanilla Silex with no additional extensions loaded. Over the time I'll try to add more branches with rather advanced configurations. Help is appreciated, so fork and send me a PR :)

Installation:
-------------

Clone this repository in a directory that is accessible by your web server 

     $ git https://github.com/b00giZm/silex-boilerplate && cd silex-boilerplate
     $ git submodule update --init --recursive

Configure a virtual host. See `vhost.conf.dist` for an example

     NameVirtualHost *:80

     <VirtualHost *:80>
       ServerName silex-boilerplate.dev
       DocumentRoot "/path/to/silex-boilerplate/web"
       DirectoryIndex index.php

      <Directory "/path/to/silex-boilerplate/web">
        AllowOverride All
        Allow from All
      </Directory>
    </VirtualHost>

Fire up your browser and navigate to the URL you configured in your vhost config

![Screenshot](https://img.skitch.com/20110913-k8e3a7km7shd4q4bmtikqr63xb.jpg)

Configuration
-------------

All configuration is done in `src/bootstrap.php`. The the file's contents for some example configurations. If you want to add your own services and/or register your own extensions, don't forget to register the appropriate namespaces inside `src/autoload.php`.

Do awesome stuff
----------------

Your application logic lives inside `src/app.php`. So fire up your editor and create something awesome :)

More info
---------
* [Silex Homepage](http://silex.sensiolabs.org)
* [Silex at Github](https://github.com/fabpot/Silex)
* [HTML5 Boilerplate](http://html5boilerplate.com)
* [Why you should use Silex](http://codenugget.org/5-reasons-why-silex-is-king-of-all-php-micro)
