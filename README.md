Yii2 Enterprise Application Template
====================================

Yii 2 Enterprise Application Template is a skeleton Yii 2 application best for rapidly creating enterprise projects.

Basis on [wfcreations/yii2-app-api](https://github.com/wfcreations/yii2-app-api)

Development:
[![Stories in Ready](https://badge.waffle.io/sibds/yii2-enterprise.png?label=ready&title=Ready)](https://waffle.io/sibds/yii2-enterprise)

[![GitHub stars](https://img.shields.io/github/stars/sibds/yii2-enterprise.svg)](https://github.com/sibds/yii2-enterprise/stargazers)
[![Latest Stable Version](https://poser.pugx.org/sibds/yii2-enterprise/v/stable)](https://packagist.org/packages/sibds/yii2-enterprise) [![Total Downloads](https://poser.pugx.org/sibds/yii2-enterprise/downloads)](https://packagist.org/packages/sibds/yii2-enterprise) [![Latest Unstable Version](https://poser.pugx.org/sibds/yii2-enterprise/v/unstable)](https://packagist.org/packages/sibds/yii2-enterprise) [![License](https://poser.pugx.org/sibds/yii2-enterprise/license)](https://packagist.org/packages/sibds/yii2-enterprise)

Travis CI: [![Build Status](https://travis-ci.org/sibds/yii2-enterprise.svg?branch=master)](https://travis-ci.org/sibds/yii2-enterprise)

Scrunitizer:
[![Build Status](https://scrutinizer-ci.com/g/sibds/yii2-enterprise/badges/build.png?b=master)](https://scrutinizer-ci.com/g/sibds/yii2-enterprise/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/sibds/yii2-enterprise/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/sibds/yii2-enterprise/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/sibds/yii2-enterprise/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/sibds/yii2-enterprise/?branch=master)

Information about develop: [https://trello.com/b/9VO2RT9g/yii2-enterprise](https://trello.com/b/9VO2RT9g/yii2-enterprise).

[Roadmap](docs/roadmap.md)

Documentation is at [docs/guide/README.md](docs/guide/README.md).

REQUIREMENTS
------------

The minimum requirement by this application template that your Web server supports PHP 5.4.0.

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
api
    config/              contains api configurations
    controllers/         contains Web controller classes
    models/              contains api-specific model classes
    runtime/             contains files generated during runtime
    modules/             contains api versioning
    v1/                  contains module version 1
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
tests                    contains various tests for the advanced application
    codeception/         contains tests developed with Codeception PHP Testing Framework
```

MODULES INCLUDED
----------------

* [*bedezign/yii2-audit*](https://bedezign.github.io/yii2-audit/) - Records and displays web/cli requests, database changes, php/js errors and associated data.
* [*dektrium/yii2-user*](http://yii2-user.dmeroff.ru/) - Flexible user registration and authentication module for Yii2.
* [*dektrium/yii2-rbac*](https://github.com/dektrium/yii2-rbac) - Yii 2 module that helps managing your RBAC system.
* [*dmstr/yii2-adminlte-asset*](https://github.com/dmstr/yii2-adminlte-asset) - AdminLTE Asset Bundle for Backend Theme.
* [*dmstr/yii2-migrate-command*](https://github.com/dmstr/yii2-migrate-command) - Console Migration Command with multiple paths/aliases support.

VIRTUAL MACHINE
---------------

**Important:** Only for testing.

Created on [PuPHPet.com](http://puphpet.com).

### How to

```
vagrant up
```

### MailCatcher

Open in browser: [http://yii2enterprise.dev:8025/](http://yii2enterprise.dev:8025/) or [http://192.168.56.101:8025/](http://192.168.56.101:8025/)

INSTALLATION
------------

### Install from an Archive File

Extract the github archive file to a directory named `yii2-enterprise` that is directly under the Web root.

After extraction run
```
php composer.phar global require "fxp/composer-asset-plugin:~1.1.1"
php composer.phar install
```

You can then access the application through the following URL:

~~~
http://localhost/yii2-enterprise/frontend/web/
~~~


### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this application template using the following command:

~~~
composer global require "fxp/composer-asset-plugin:~1.1.1"
php composer.phar create-project --prefer-dist --stability=dev sibds/yii2-enterprise app
~~~

Now you should be able to access the application through the following URL, assuming `app` is the directory
directly under the Web root.

~~~
http://localhost/app/api/web/
http://localhost/app/backend/web/
http://localhost/app/frontend/web/
~~~

CONFIGURATION
-------------

### Database

Edit the file `common/config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2-enterprise',
    'username' => 'root',
    'password' => '123',
    'charset' => 'utf8',
];
```
**NOTE:** Yii won't create the database for you, this has to be done manually before you can access it.

Also check and edit the other files in the `config/` directory to customize your application.

#### Apply migrations

[How configure migrations.](docs/guide/configure-migrations.md)

```php
php yii migrate
```

#### Problem with migrations
1. Try comment in file `common/config/main.php` the following lines:
```
'audit' => [
    'class' => 'bedezign\yii2\audit\Audit'
],
```
after migration complition, uncomment these lines.


### Enabling JSON Input

To let the API accept input data in JSON format, configure the [[yii\web\Request::$parsers]] property of
the `request` [application component](http://www.yiiframework.com/doc-2.0/guide-structure-application-components.html)
to use the [[yii\web\JsonParser]] for JSON input:

```php
'request' => [
    'parsers' => [
        'application/json' => 'yii\web\JsonParser',
    ]
]
```

> Info: The above configuration is optional. Without the above configuration, the API would only recognize 
  `application/x-www-form-urlencoded` and `multipart/form-data` input formats.
  
**IMPORTANT: without rbac/init you CAN'T LOG IN into backend**

### Demo user

~~~
Login: webmaster
Password: webmaster
~~~

