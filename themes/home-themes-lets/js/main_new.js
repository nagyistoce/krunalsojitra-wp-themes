(function ($, window, document, undefined) {

    var gridContainer = $('#grid-container'),
        filtersContainer = $('#filters-container');

	// init cubeportfolio
    gridContainer.cubeportfolio({
       
        animationType: 'sequentially',

        gapHorizontal: 50,

        gapVertical: 40,

        gridAdjustment: 'responsive',

        caption: 'fadeIn',

        displayType: 'lazyLoading',

        displayTypeSpeed: 400,        

        // single page popup
        singlePageDelegate: '.cbp-singlePage',
        singlePageDeeplinking: true,
        singlePageStickyNavigation: true,
        singlePageShowCounter: true,
        singlePageCallback: function (url, element) {

            // to update singlePage content use the following method: this.updateSinglePage(yourContent)
            var t = this;

            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'html',
                timeout: 5000
            })
            .done(function(result) {
                t.updateSinglePage(result);
            })
            .fail(function() {
                t.updateSinglePage("Error! Please refresh the page!");
            });
            
        }

        // NOTE: lightbox is not enabled in this example
    });

    // add listener for filters click
    filtersContainer.on('click', '.cbp-filter-item', function (e) {
        
        var me = $(this);

        // get cubeportfolio data and check if is still animating (reposition) the items.
        if ( !$.data(gridContainer[0], 'cubeportfolio').isAnimating ) {
            me.addClass('cbp-filter-item-active').siblings().removeClass('cbp-filter-item-active');
        }

        // filter the items
        gridContainer.cubeportfolio('filter', me.data('filter'), function () {});
    
    });

    // activate counter for filters
    gridContainer.cubeportfolio('showCounter', filtersContainer.find('.cbp-filter-item'));

})(jQuery, window, document);