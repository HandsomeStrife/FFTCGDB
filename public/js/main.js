var delay = (function(){
    var timer = 0;
    return function(callback, ms){
        clearTimeout (timer);
        timer = setTimeout(callback, ms);
    };
})();

function attachCardHover()
{
    $('.js-hover-info').not('.hvr-attached').each(function(i, o) {
        $(o).qtip({
            content: {
                title: function() {
                    var img = '<img class="small-icon" src="/img/icons/'+ $(o).attr('data-element') +'.png"/>';
                    return "[" + $(o).attr('data-cost') + "] " + img + " " + $(o).attr('data-title') + " (" + $(o).attr('data-number') + ")";
                },
                text: function(event, api) {
                    $.ajax({
                        type: 'POST',
                        url: '/card/description',
                        dataType: 'html',
                        data: { card_id: $(o).attr('data-id') }
                    })
                    .then(function(content) {
                        // Set the tooltip content upon successful retrieval
                        api.set('content.text', content);
                    }, function(xhr, status, error) {
                        // Upon failure... set the tooltip content to the status and error value
                        api.set('content.text', status + ': ' + error);
                    });
                    return 'Loading...'; // Set some initial text
                }
            },
            style: {
                classes: 'qtip-bootstrap qtip-nrdb'
            },
            position: {
                my: 'left center',
                at: 'right center'
            }
        });
    }).addClass('hvr-attached');
}

/**
* Tooltips
*/
function attachTooltips()
{
    $("[title]").not('.tooltips-attached').hover(function() {
        // Get and remove the title, it its not empty
        var title = $(this).attr('title');
        if (!$.trim(title)) {
            return;
        }
        $(this).attr('data-title', title).removeAttr('title');
        // Add the new element
        $('<p class="tooltip-hover"></p>').text(title).appendTo('body').fadeIn();
    }, function() {
        $(this).attr('title', $(this).attr('data-title'));
        $('.tooltip-hover').remove();
    }).mousemove(function(e) {
        var mousex = e.pageX + 5; //Get X coordinates
        var mousey = e.pageY + 5; //Get Y coordinates
        $('.tooltip-hover').css({ top: mousey, left: mousex });
    }).addClass('tooltips-attached');
}

$(document).ready(function() {
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /**
     * Foil sparkle effects
     *
     */
    var foil_elements = $(".card .card-image");
    foil_elements.sparkle({
        count: 50,
        direction: "up",
        color: "#FFFFFF"
    }).off("mouseover.sparkle").off("mouseout.sparkle").off("focus.sparkle").off("blur.sparkle");

    function updateFoils()
    {
        foil_elements.filter('.has-foil').trigger('start.sparkle');
        foil_elements.filter('.no-foil').trigger('stop.sparkle');
    }
    updateFoils();


    /**
     * Isotope grid setup
     *
     */
    var $grid = $('.isotope');
    $grid.isotope({
        itemSelector: '.card',
        layoutMode: 'fitRows'
    });
    $grid.imagesLoaded().progress(function() {
        $grid.isotope('layout');
    });
    $grid.on( 'arrangeComplete', function() {
        $(window).trigger("scroll");
    });

    /**
     * Isotope Filtering
     *
     */
     var filters = {};

    $('.js-filter').click(function() {
        var $this = $(this);
        // get group key
        var $buttonGroup = $this.parents('.button-group');
        var filterGroup = $buttonGroup.attr('data-filter-group');
        $buttonGroup.find('.js-filter').removeClass('selected');
        // set filter for group
        if (filters[filterGroup] == $this.attr('data-filter')) {
            delete(filters[filterGroup]);
            var $default = $buttonGroup.find('.js-default-filter');
            if ($default) {
                $default.addClass('selected');
            }
        } else {
            filters[filterGroup] = $this.attr('data-filter');
            $(this).addClass('selected');
        }
        // combine filters
        var filterValue = concatValues( filters );
        $grid.isotope({ filter: filterValue });
    });

    $('.js-name-filter').keyup(function() {
        var val = $(this).val().toLowerCase();
        $grid.find('.card').removeClass('nameShow');
        if (val.length == 0) {
            delete(filters['name']);
        } else {
            $grid.find('.card').filter(function(index) {
                var title = $(this).attr('data-title');
                return (title.toLowerCase().indexOf(val) > -1);
            }).addClass('nameShow');
            filters['name'] = '.nameShow';
        }
        var filterValue = concatValues( filters );
        $grid.isotope({ filter: filterValue });
        console.log(filterValue);
    });

    // flatten object by concatting values
    function concatValues( obj ) {
        var value = '';
        for ( var prop in obj ) {
            value += obj[ prop ];
        }
        return value;
    }

    /**
     * Popup view
     */
    $('.js-view-full').magnificPopup({
        type: 'image'
    }).addClass('view-full-attached');

    attachTooltips();
    attachCardHover();

    $("img.lazy").lazyload({
        threshold : 200,
        effect : "fadeIn"
    }).on('load', function() {
        var $container = $(this).parents('.card-image');
        if ($container) {
            $container.addClass('loaded');
        }
    });
    
    $('.js-select2').select2({
        templateResult: formatSelect2Options,
        templateSelection: formatSelect2Options
    });

    function formatSelect2Options(res)
    {
        var img = $(res.element).attr('data-image');
        if (img) {
            return $('<span><img src="' + img + '"/> ' + res.text + '</span>');
        }
        return res.text;
    }

    setTimeout(function() {
        $('.hoverZoomLink').removeClass('hoverZoomLink');
    }, 800);
});