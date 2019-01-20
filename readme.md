# LaravelPackageExample

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![StyleCI][ico-styleci]][link-styleci]
<!--[![Build Status][ico-travis]][link-travis]-->

This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.

A custom made Laravel package boilerplate made for package development purpose, which contains publish code for:

- Config
- View
- Assets
- Migrations
- Seeds
- Routes

Use it as a starting point for your own Laravel packages.

Includes PHPUnit and PHPCodeSniffer configuration, as well as a known good Travis CI configuration and a couple of base test cases. Uses `orchestra/testbench` as the basis of the provided base test.

## Installation

Via Composer

``` bash
$ composer require krisozolins/laravelpackageexample
```

## Usage

1\. Clone this repository into your package development folder.

2\. Change src/Package to your package name. Customize the package's composer.json autoload section to reflect the previous change.

3\. Customize **KrisOzolins\LaravelPackageExample** with the correct namespace and the name of your package, and replace the $vendorName and $packageName attributes in the service provider.

```php
protected $vendorName = 'vendorname';
protected $packageName = 'yourpackagename';
```

4\. Add the package in your application's **composer.json** autoload section to make it available in your application. 

```
"psr-4": {
    "App\\": "app/",
    "Vendor\\Package\\": "packages/vendor/package/src/Package"
 }
```

5\. Run:

```
composer dump-autoload
```

6\. Add the newly create package's service provider to your **config/app.php** provider's list.

7\. Have fun!

## Package dependencies

Laravel won't autoload the **vendor/** path in your package's development folder. Easiest workaround is to add them in your main application's composer.json.

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email kris.ozolins@gmail.com instead of using the issue tracker.

## Other

* For another way to setup tests you can see:
https://github.com/matthewbdaly/laravel-package-boilerplate
* For a way to use this package for new pacakge development, using composer create-project, also see: https://github.com/matthewbdaly/laravel-package-boilerplate

## Version

According to the composer docs the [version](https://getcomposer.org/doc/04-schema.md#version):

>must follow the format of X.Y.Z or vX.Y.Z with an optional suffix of
>-dev, -patch (-p), -alpha (-a), -beta (-b) or -RC. The patch, alpha, beta and
>RC suffixes can also be followed by a number.
>Examples:
> * 1.0.0
> * 1.0.2
> * 0.1.0
> * 0.2.5
> * 1.0.0-dev
> * 1.0.0-alpha3
> * 1.0.0-beta2
> * 1.0.0-RC5
> * v2.0.4-p1

## Testing
Create a new `phpunit.xml` file with:
```bash
$ cp phpunit.xml.dist phpunit.xml
```

This boilerplate uses [orchestral/testbench](https://github.com/orchestral/testbench) which is a "Laravel Testing Helper for Packages Development".

After install the dependencies you can run all the tests by excecuting the follow command:

```bash
$ vendor/bin/phpunit
```

The output should look similar to this:

```bash
.                                                                  1 / 1 (100%)

Time: 84 ms, Memory: 12.00MB

OK (1 test, 1 assertion)


```

All the test files should be inside the `tests/` directory. Here is an example:

```php

<?php

namespace NamespaceHolder\Tests\Unit;

use NamespaceHolder\Tests\TestCase;

class ExampleTest extends TestCase
{
    /** @test */
    public function example_test_method()
    {
        $this->assertTrue(true);
    }
}

```

## Installing as a dependency on a laravel project
Is very likely you'll need to install this package locally to test the integration. You can do so by adding the follow to the `composer.json` file in your laravel project.

```json
    "repositories": [
        {
            "type": "path",
            "url": "path/to/package/folder"
        }
    ],
```

Then, in your laravel project root path you can just run:

```bash
$ composer require namespace/package-name
```

## Configuration

Since we are trying to building a new laravel package, is a good idea to pull all the configuration files inside the `/config` folder to keep a laravel-like folder structure.

## Bootstrapping

Ideally you'll build this new package using [#TDD](https://en.wikipedia.org/wiki/Test-driven_development), so in order to load all the dependencies a bootstrap.php was added inside the tests directory with the escencial configuration.

```php
<?php

require __DIR__.'/../vendor/autoload.php';

date_default_timezone_set('UTC');

```

## Service Provider

With laravel is really easy to integrate or install any package. Is recomended to use a service provider if you want to bind things into laravel's service container.
Here you can find more info about the [Laravel service providers](https://laravel.com/docs/5.4/packages#service-providers)

```php
<?php

namespace NamespaceHolder\Providers;

use Illuminate\Support\ServiceProvider;

class PackageServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     */
    public function register()
    {
        //
    }

    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        // If you need to copy a config file to the laravel project
        $this->publishes([
            __DIR__.'/path/to/config/file.php' => config_path('file.php'),
        ]);
    }
}

```

## Laravel Package Auto discovering

This is a new feature added recently to the laravel framework, now you can just install this package thru composer and is going to be automatically registered in the laravel project. To do so you need to add this section in the package `composer.json` file:

```json
    "extra": {
        "laravel": {
            "providers": [
                "NamespaceHolder\\Providers\\PackageServiceProvider"
            ]
        }
    }
```

And you can also register multiple alias with:
```json
    "extra": {
        "laravel": {
            "providers": [
                "NamespaceHolder\\Providers\\PackageServiceProvider"
            ]
        },
        "aliases": {
            "Bar": "Foo\\Bar\\Facade"
        }
    }
```

## Git

A .gitignore file is included with the most common and basic setup
```
vendor/
composer.lock
phpunit.xml
node_modules/
.idea
```

## Make it yours!

You just need to edit your personal info in the `composer.json` file, and run a quick search into the package folder to change the `NamespaceHolder` string by your custom namespace ant that's it.

Have fun! 🎊

## Credits

- [Krisjanis Ozolins][link-author]
- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](license.md) for more information.

Here you can find more info about how to [How to Choose an open source licence](https://choosealicense.com/)

[ico-version]: https://img.shields.io/packagist/v/krisozolins/laravel-package-example.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/krisozolins/laravel-package-example.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/krisozolins/laravel-packageexample/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/166639314/shield

[link-packagist]: https://packagist.org/packages/krisozolins/laravel-package-example
[link-downloads]: https://packagist.org/packages/krisozolins/laravel-package-example
[link-travis]: https://travis-ci.org/krisozolins/laravelpackageexample
[link-styleci]: https://styleci.io/repos/166639314
[link-author]: https://github.com/krisozolins
[link-contributors]: ../../contributors
