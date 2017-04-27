
# refactor-package API
Propose an universal interface for code description.

## API Demo
Target a PHP or JS repository like  [snub69/refactor-package](http://refactor-package.alwaysdata.net/snub69/refactor-package).
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
* **snub69** - [www.snub69.fr](http://www.snub69.fr)