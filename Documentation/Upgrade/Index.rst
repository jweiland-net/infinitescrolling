:navigation-title: Upgrade

..  _upgrade:

=======
Upgrade
=======

..  _upgrade-5-0-0:

Upgrade to version 5.0.0
========================

Version 5.0.0 contains three breaking changes.

TYPO3 13 is not supported anymore
---------------------------------

Version 5.x requires TYPO3 14.3. Stay with version 4.x as long as your
installation runs on TYPO3 13.

JavaScript is not included via TypoScript anymore
-------------------------------------------------

Up to version 4.x the JavaScript files were included with
`page.includeJSFooter` and the initialization with
`page.jsFooterInline.1519224720`. An event listener includes them now, as soon
as the :guilabel:`Infinite Scrolling` Site Set is assigned to the site.

Remove all TypoScript of your site package which modifies these keys, for
example `page.includeJSFooter.infiniteScrolling_history >`. It has no effect
anymore. Instead:

*   Enable or disable single IAS extensions in the Site Settings, see
    :ref:`configuration-ias-extensions`.
*   Register further IAS extensions or callbacks with your own JavaScript, see
    :ref:`configuration-javascript-event`.

The scroll container expects a selector
---------------------------------------

The setting `infinitescrolling.scrollContainer` was inserted as JavaScript
code up to version 4.x, for example `jQuery(window)`. It is a CSS selector now,
or `window` for the browser window.

Check :guilabel:`Site Management -> Settings` of each site and replace values
like `jQuery(window)` with `window`, or `jQuery('div.scroll-area')` with
`div.scroll-area`.
