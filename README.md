Gravatar Bundle
===============

[![Build Status](https://img.shields.io/travis/EmanueleMinotto/Gravatar.svg?style=flat)](https://travis-ci.org/EmanueleMinotto/Gravatar)
[![Coverage Status](https://img.shields.io/coveralls/EmanueleMinotto/Gravatar.svg?style=flat)](https://coveralls.io/r/EmanueleMinotto/Gravatar)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/EmanueleMinotto/Gravatar.svg?style=flat)](https://scrutinizer-ci.com/g/EmanueleMinotto/Gravatar/)
[![Total Downloads](https://img.shields.io/packagist/dt/emanueleminotto/gravatar-bundle.svg?style=flat)](https://packagist.org/packages/emanueleminotto/gravatar-bundle)

Bundle for Symfony 2 providing the [Gravatar](https://github.com/EmanueleMinotto/Gravatar) library.

API: [emanueleminotto.github.io/GravatarBundle](http://emanueleminotto.github.io/GravatarBundle/)

Step 1: Download the Bundle
---------------------------

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```bash
$ composer require emanueleminotto/gravatar-bundle
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Step 2: Enable the Bundle
-------------------------

Then, enable the bundle by adding the following line in the `app/AppKernel.php`
file of your project:

```php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...

            new EmanueleMinotto\GravatarBundle\GravatarBundle(),
        }
    }
}
```

Usage
-----

No more requirements, you can start using the `gravatar` service and the [Twig extension](https://github.com/EmanueleMinotto/Gravatar#twig-extension).

Reading:

 * [Configuration Reference](https://github.com/EmanueleMinotto/GravatarBundle/tree/master/Resources/doc/configuration-reference.rst)

License
-------

This bundle is under the MIT license. See the complete license in the bundle:

    Resources/meta/LICENSE
