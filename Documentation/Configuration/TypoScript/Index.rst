..  include:: /Includes.rst.txt


..  _typoscript:

==========
TypoScript
==========

`infinitescrolling` needs some basic TypoScript configuration. To do so you
have to add an +ext template to either the root page of your website or to a
specific page where you want to use the `infinitescrolling` feature.

..  rst-class:: bignums

1.  Locate page

    You have to decide where you want to insert the TypoScript template. Either
    root page or page where you want to use the `infinitescrolling` feature.

2.  Create TypoScript template

    Switch to template module and choose the specific page from above in the
    pagetree. Choose `Click here to create an extension template` from the
    right frame. In the TYPO3 community it is also known as "+ext template".

3.  Add static template

    Choose `Info/Modify` from the upper selectbox and then click
    on `Edit the whole template record` button below the little table. On
    tab `Includes` locate the section `Include static (from extension)`. Use
    the search above `Available items` to search for `infinitescrolling`.
    Hopefully just one record is visible below. Choose it, to move that record
    to the left.

4.  Save

    If you want you can give that template a name on tab "General", save
    and close it.

5.  Constants Editor

    Choose `Constant Editor` from the upper selectbox.

6.  `infinitescrolling` constants

    Choose `PLUGIN.TX_INFINITESCROLLING` from the category selectbox to show
    just `infinitescrolling` related constants

7.  Configure constants

    Adapt the constants to your needs.

Constants
=========

..  confval:: includeJQueryLibrary

    :type: boolean
    :Default: 1 (true)
    :Path: plugin.tx_infinitescrolling

    Set to 1 (true) to use external included jquery JavaScript library. For
    europe we prefer to deactivate (0) that feature because of GDPR/DSGVO.

..  confval:: scrollContainer

    :type: string
    :Default: jQuery(window)
    :Path: plugin.tx_infinitescrolling

    jQuery selector for Scroll Container: In which container the scrollbar
    is placed?

    Sample: `jQuery(window)`

..  confval:: container

    :type: string
    :Default: (none)
    :Path: plugin.tx_infinitescrolling

    jQuery selector for item container: Enter the selector which selects the
    container which contains all f.e. news or event items you want to paginate.

    Sample: `div.news-list-container`

..  confval:: item

    :type: string
    :Default: (none)
    :Path: plugin.tx_infinitescrolling

    jQuery selector for one single item: Enter the selector which contains
    exactly one single item within the list container.

    Sample: `div.news-list-item`

..  confval:: pagination

    :type: string
    :Default: ul.f3-widget-paginator
    :Path: plugin.tx_infinitescrolling

    jQuery selector for Paginator: Enter the selector for the paginator.
    This selector will hide paginator in Frontend.

    Sample: `div.news-list-browse`

..  confval:: next

    :type: string
    :Default: li.next a
    :Path: plugin.tx_infinitescrolling

    jQuery selector for next link: Enter the selector for the next link within
    the paginator. InfiniteScrolling will read the href attribute to read the
    container of next page and append it to current container.

    Sample: `div.browseLinksWrap a:eq(-2)`

..  confval:: previous

    :type: string
    :Default: li.previous a
    :Path: plugin.tx_infinitescrolling

    jQuery selector for previous link: Enter the selector for the previous
    link of the paginator. The href attribute of this element will be used to
    get the items from the previous page. Make sure there is only one element
    that matches the selector.

    Sample: `li.previous a`

..  confval:: loader.html

    :type: string
    :Default: <div class="ias-spinner" style="text-align: center;"><img src="|"/></div>
    :Path: plugin.tx_infinitescrolling

    Change HTML of loader icon: Enter your own HTML, if you want another
    rendering of the loader icon. Use {src} to implement the original loader
    icon from infinitescrolling JS.

    Sample: `<div class="ias-spinner" style="text-align: center;"><img src="|"/></div>`

..  confval:: delay

    :type: int
    :Default: 0
    :Path: plugin.tx_infinitescrolling

    Define a delay until further items will be loaded: If you want the user to
    see the loader icon working you should set this value to something higher
    than 0. Value in milliseconds.

    Sample: `5`

..  confval:: offset

    :type: int
    :Default: 5
    :Path: plugin.tx_infinitescrolling

    Amount of loads: How often more items should be loaded, before we show a
    link to manually load further items? Don't set it too high as footer may
    not be reachable then.

    Sample: `7`

..  confval:: negativeMargin

    :type: int
    :Default: 200
    :Path: plugin.tx_infinitescrolling

    Start next request when margin (ps) has been reached: Define a margin from
    the lowest border of the last item. If scrollbar reaches this margin the
    new request will be started. As higher the value as earlier the page will
    start loading further items.

    Sample: `130`
