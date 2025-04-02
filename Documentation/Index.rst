..  _start:

==================
Infinite Scrolling
==================

The :t3ext:`infinitescrolling` replaces the page browser at the bottom
with an endless scrolling feature. This functionality is popular in
applications like TikTok, LinkedIn, X and Facebook. As users scroll down,
additional records are automatically loaded from the server.

This improves the user experience by allowing more (or all) records to be
viewed without requiring navigation to a new page or clicking a link.

The Infinite Scrolling extension can be integrated into existing TYPO3
projects without modifying the extension plugin or HTML template. The page
browser is only hidden, not removed. This ensures it remains accessible, for
example, to screen readers.

This extension utilizes the jQuery plugin
`jquery-ias.js by Jeroen Fiege <https://infiniteajaxscroll.com/>`_.

..  note::
    Please note that while the JavaScript behind infinitescrolling is OpenSource
    (MIT license), commercial use requires a paid license:
    https://infiniteajaxscroll.com/download.html

..  _what-it-does:

What does it do?
================

Many TYPO3 extension plugins provide a list view to display records.
Typically, 5 to 20 records are shown at a time, each linking to a single-view
page. When the number of records exceeds a predefined limit, a page browser is
normally used to navigate between pages.

With Infinite Scrolling, the page browser is hidden, and additional records
are automatically loaded via AJAX when the user reaches the end of the
currently visible list. This creates a seamless browsing experience without
the need for manual pagination.

A working example can be found at
`jweiland.net <https://jweiland.net/aktuelles.html>`_.


..  toctree::
    :glob:
    :titlesonly:
    :hidden:

    Installation/Index
    Configuration/Index
    */Index
    *

..  card-grid::
    :columns: 1
    :columns-md: 2
    :gap: 4
    :class: pb-4
    :card-height: 100

    ..  card:: :ref:`Installation <installation>`

        Explains how to install this extension in Composer-based and Classic
        TYPO3 installations.

    ..  card:: :ref:`Configuration <configuration>`

        Learn how to configure this extension.
