.. include:: ../Includes.txt


.. _introduction:

Introduction
============

Infinite scrolling is a JS library created by https://infiniteajaxscroll.com
It can convert nearly any paginator into an infinite scrolling system.
Please keep in mind that infinitescrolling is OpenSource (MIT licence) but should be paid for commercial-use:
https://infiniteajaxscroll.com/download.html


.. _what-it-does:

What does it do?
----------------

Many TYPO3 extension plugins provide a list view for output. Typically 5 to 20 data records are shown in list view [1],
each with a link to the single view. If there are more than a predefined number of records to show, a page browser [2]
is used to switch between pages of the list view (see image below):

.. figure:: Images/infinite-scroll-tt-news-list.png
   :width: 400px
   :alt: Standard list view of news with page browser at bottom

   Standard list view of tt_news with page browser at bottom

   A working example can be seen at http://jweiland.net/aktuelles.html

