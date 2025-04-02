:navigation-title: Installation

..  _installation:

============
Installation
============

Composer
========

If your TYPO3 installation works in composer mode, please execute
following command:

..  code-block:: bash

    composer req jweiland/infinitescrolling
    vendor/bin/typo3 extension:setup --extension=infinitescrolling

If you work with DDEV please execute this command:

..  code-block:: bash

    ddev composer req jweiland/infinitescrolling
    ddev exec vendor/bin/typo3 extension:setup --extension=infinitescrolling

Extension Manager
=================

On non composer based TYPO3 installations you can
install :t3ext:`infinitescrolling` still over the Extension Manager:

..  rst-class:: bignums

1.  Login

    Login to backend of your TYPO3 installation as an administrator
    or system maintainer.

2.  Open ExtensionManager

    Click on :guilabel:`Extensions` from the left menu to open the
    Extension Manager.

3.  Update Extensions

    Choose :guilabel:`Get Extensions` from the upper selectbox and click on
    the :guilabel:`Update now` button at the upper right.

4.  Install :t3ext:`infinitescrolling`

    Use the search field to find "infinitescrolling". Choose
    the "infinitescrolling" line from the search result and click on the cloud
    icon to install "infinitescrolling".

Next step
=========

:ref:`Configure infinitescrolling <configuration>`.
