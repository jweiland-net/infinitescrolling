(function ($) {
  $(function () {
    if (!window.InfiniteScrollingConfig) {
      return;
    }

    const config = window.InfiniteScrollingConfig;

    let scrollContainer;

    switch (config.scrollContainer) {
      case 'window':
        scrollContainer = jQuery(window);
        break;

      default:
        scrollContainer = jQuery(config.scrollContainer);
    }

    const ias = $.ias({
      container: config.container,
      scrollContainer,
      item: config.item,
      pagination: config.pagination,
      next: config.next,
      delay: config.delay,
      negativeMargin: config.negativeMargin
    });

    ias.extension(new IASSpinnerExtension({
      html: config.loaderHtml
    }));

    ias.extension(new IASPagingExtension());

    ias.extension(new IASTriggerExtension({
      text: config.loadMoreText,
      textPrev: config.loadPrevText,
      offset: config.offset
    }));

    ias.extension(new IASHistoryExtension({
      prev: config.previous
    }));
  });
})(jQuery);
