..  Editor configuration
	...................................................
	* utf-8 with BOM as encoding
	* tab indentation with 4 characters (no space)
	* no wrapping when reaching the end of the margin, configuration with soft carriage return

.. Includes roles, substitutions, ...
.. include:: _Inclusion.rst

==================
Infinite Scrolling
==================

:Extension name: Infinite Scrolling
:Extension key: infinitescrolling
:Version: 1.0.0
:Language: en
:Description: Infinite Scrolling extension to replace page browser in list view
:Copyright: 2013
:Author: Stefan Frömken (Code), Jochen Weiland (Documentation)
:Email: sfroemken@jweiland.net, jweiland@jweiland.net
:Licence: Open Content License available from `www.opencontent.org/opl.shtml <http://www.opencontent.org/opl.shtml>`_

The content of this document is related to TYPO3,

a GNU/GPL CMS/Framework available from `www.typo3.org
<http://www.typo3.org/>`_


**Table of Contents**

.. toctree::
	:maxdepth: 5
	:titlesonly:
	:glob:

	UserManual
	AdministratorManual
	ProjectInformation

.. STILL TO ADD IN THIS DOCUMENT
	@todo: add section about how screenshots can be automated. Pointer to PhantomJS could be added.
	@todo: explain how documentation can be rendered locally and remotely.
	@todo: explain which files should be versioned and which not (_build, Makefile, conf.py, ...)
	@todo: a word about inclusion

What does it do?
=================

Many TYPO3 extension plugins provide a list view for output. Typically 5 to 20 data records are shown in list view [1],
each with a link to the single view. If there are more than a predefined number of records to show, a page browser [2]
is used to switch between pages of the list view (see image below):

.. figure:: Images/infinite-scroll-tt-news-list.png
		:width: 400px
		:alt: Standard list view of tt_news with page browser at bottom

		Standard list view of tt_news with page browser at bottom

A working example can be seen at http://jweiland.net/aktuelles.html


