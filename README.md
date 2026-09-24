
# TYPO3 Extension `infinitescrolling`

[![Packagist][packagist-logo-stable]][extension-packagist-url]
[![Latest Stable Version][extension-build-shield]][extension-ter-url]
[![Total Downloads][extension-downloads-badge]][extension-packagist-url]
[![Monthly Downloads][extension-monthly-downloads]][extension-packagist-url]
[![TYPO3 14.3][TYPO3-shield]][TYPO3-14-url]

![Build Status][extension-ci-shield]

Read the Extension Manual:
https://docs.typo3.org/p/jweiland/infinitescrolling/main/en-us/Index.html

infinitescrolling on TYPO3 TER:
https://extensions.typo3.org/extension/infinitescrolling

## What does it do?

This TYPO3 Extension can replace various PageBrowsers, hide them and realizes infinite scrolling.
If you scroll down a list, the list of the next page will be automatically appended to
the current list. You, as a website visitor don't need to click on to the next page anymore.
Further the old PageBrowser still exists in Source code, so screen readers should work just fine.

## Installation

### Installation using Composer

Run the following command within your Composer based TYPO3 project:

```
composer require jweiland/infinitescrolling
```

### Installation using Extension Manager

Login into TYPO3 Backend of your project and click on `Extensions` in the left menu.
Press the `Retrieve/Update` button and search for the extension key `infinitescrolling`.
Import the extension from TER (TYPO3 Extension Repository)

## Licensing

This extension is based on [Infinite Ajax Scroll](https://infiniteajaxscroll.com) which is dual licensed:

1. Under the Free Software Foundation’s [GNU AGPL v.3.0](https://github.com/webcreate/infinite-ajax-scroll/blob/master/LICENSE); or
2. Under an [Infinite Ajax Scroll Commercial License](https://infiniteajaxscroll.com/licenses/)

Buying a commercial license is mandatory as soon as you develop commercial activities distributing the Infinite Ajax Scroll software inside your product or deploying it on a network without disclosing the source code of your own applications under the AGPL license.

See https://infiniteajaxscroll.com/licenses/ for more details.

## Support

Free Support is available via [Github Issue Tracker](https://github.com/jweiland-net/infinitescrolling/issues).

For commercial support, please contact us at [support@jweiland.net](mailto:support@jweiland.net).

<!-- MARKDOWN LINKS & IMAGES -->

[extension-build-shield]: https://poser.pugx.org/jweiland/infinitescrolling/v/stable.svg?style=for-the-badge

[extension-ci-shield]: https://github.com/jweiland-net/infinitescrolling/actions/workflows/ci.yml/badge.svg

[extension-downloads-badge]: https://poser.pugx.org/jweiland/infinitescrolling/d/total.svg?style=for-the-badge

[extension-monthly-downloads]: https://poser.pugx.org/jweiland/infinitescrolling/d/monthly?style=for-the-badge

[extension-ter-url]: https://extensions.typo3.org/extension/infinitescrolling/

[extension-packagist-url]: https://packagist.org/packages/jweiland/infinitescrolling/

[packagist-logo-stable]: https://img.shields.io/badge/--grey.svg?style=for-the-badge&logo=packagist&logoColor=white

[TYPO3-14-url]: https://get.typo3.org/version/14

[TYPO3-shield]: https://img.shields.io/badge/TYPO3-14.3-green.svg?style=for-the-badge&logo=typo3
