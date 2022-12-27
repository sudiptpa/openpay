# Omnipay: Openpay

**Openpay driver for the Omnipay PHP payment processing library**

[Omnipay](https://github.com/thephpleague/omnipay) is a framework agnostic, multi-gateway payment
processing library for PHP. This package implements Openpay support for Omnipay.

[![StyleCI](https://github.styleci.io/repos/173117409/shield?branch=master&style=flat)](https://github.styleci.io/repos/173117409)
[![Latest Stable Version](https://poser.pugx.org/sudiptpa/omnipay-openpay/v/stable)](https://packagist.org/packages/sudiptpa/omnipay-openpay)
[![Total Downloads](https://poser.pugx.org/sudiptpa/omnipay-openpay/downloads)](https://packagist.org/packages/sudiptpa/omnipay-openpay)
[![License](https://poser.pugx.org/sudiptpa/omnipay-openpay/license)](https://packagist.org/packages/sudiptpa/omnipay-openpay)

## Installation

Omnipay is installed via [Composer](http://getcomposer.org/). To install, simply add it
to your `composer.json` file:

```json
{
    "require": {
        "sudiptpa/omnipay-openpay": "~3.0"
    }
}
```

And run composer to update your dependencies:

    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar update


Follow the respective integration guidelines for [REST API](https://github.com/sudiptpa/openpay/blob/master/OPENPAY_REST.md), [XML API](https://github.com/sudiptpa/openpay/blob/master/OPENPAY_XML.md)

For general usage instructions, please see the main [Omnipay](https://github.com/thephpleague/omnipay)
repository.

## Support

If you are having general issues with Omnipay, we suggest posting on
[Stack Overflow](http://stackoverflow.com/). Be sure to add the
[omnipay tag](http://stackoverflow.com/questions/tagged/omnipay) so it can be easily found.

If you want to keep up to date with release anouncements, discuss ideas for the project,
or ask more detailed questions, there is also a [mailing list](https://groups.google.com/forum/#!forum/omnipay) which
you can subscribe to.

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/sudiptpa/openpay/issues),
or better yet, fork the library and submit a pull request.
