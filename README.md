[![Codacy Badge](https://api.codacy.com/project/badge/Grade/d7716928f5a24bd7b8533b8395765347)](https://www.codacy.com/app/Snub69/refactor-package?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Snub69/refactor-package&amp;utm_campaign=Badge_Grade)
[![Build Status](https://travis-ci.org/Snub69/refactor-package.svg?branch=master)](https://travis-ci.org/Snub69/refactor-package)

# refactor-package API
Propose an universal interface for code description.

## API Demo
Target a PHP or JS repository like  [snub69/minbox](http://snub69.alwaysdata.net/snub69/minbox).
```
{
    "distribuable": false,
    "testable": true,
    "language": "php",
    "vendor": "snub69",
    "repository": "refactor-package",
    "package": "snub69\/refactor-package",
    "description": "An universal interface for code description",
    "keywords": [
        "api",
        "api-rest",
        "repository-description",
        "package-description"
    ],
    "type": "project",
    "homepage": "http:\/\/refactor-package.alwaysdata.net\/snub69\/refactor-package",
    "dependencies": [],
    "devDependencies": [
        "phpunit\/phpunit"
    ],
    "version": [],
    "license": "MIT",
    "author": "snub69"
}
```
The API provide a short description per repository. Based on package.json or composer.json check if the code is available on nmp or packagist and travis. The hosted demo allow all origins.

## Installation
Clone this repository
```
git clone https://github.com/snub69/refactor-package.git
```

## Run the tests
Run with phpunit after install dependencies
```
composer update
phpunit
```

## Authors
* **snub69** - [www.da-dn.fr](http://www.da-dn.fr)