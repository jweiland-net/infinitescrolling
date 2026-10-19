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

    const extensions = config.extensions || {};

    // Register an IAS extension only if it is enabled in the site settings and its file has been loaded
    const isAvailable = function (name, extensionClass) {
      return extensions[name] === true && typeof window[extensionClass] === 'function';
    };

    if (isAvailable('spinner', 'IASSpinnerExtension')) {
      const spinnerOptions = {
        html: config.loaderHtml
      };

      if (config.loaderSrc) {
        spinnerOptions.src = config.loaderSrc;
      }

      ias.extension(new IASSpinnerExtension(spinnerOptions));
    }

    if (isAvailable('paging', 'IASPagingExtension')) {
      ias.extension(new IASPagingExtension());
    }

    if (isAvailable('trigger', 'IASTriggerExtension')) {
      ias.extension(new IASTriggerExtension({
        text: config.loadMoreText,
        textPrev: config.loadPrevText,
        offset: config.offset
      }));
    }

    if (isAvailable('history', 'IASHistoryExtension')) {
      ias.extension(new IASHistoryExtension({
        prev: config.previous
      }));
    }

    if (isAvailable('noneLeft', 'IASNoneLeftExtension')) {
      const noneLeftOptions = {
        text: config.noneLeftText
      };

      if (config.noneLeftHtml) {
        noneLeftOptions.html = config.noneLeftHtml;
      }

      ias.extension(new IASNoneLeftExtension(noneLeftOptions));
    }

    // Allows integrators to register further IAS extensions or callbacks with their own JavaScript
    document.dispatchEvent(new CustomEvent('infinitescrolling:initialized', {
      detail: {
        ias,
        config
      }
    }));
  });
})(jQuery);
