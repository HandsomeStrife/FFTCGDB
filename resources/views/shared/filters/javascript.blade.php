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
    } else {
        filters[filterGroup] = $this.attr('data-filter');
        $(this).addClass('selected');
    }
    // combine filters
    var filterValue = concatValues( filters );
    $grid.isotope({ filter: filterValue });
});

// flatten object by concatting values
function concatValues( obj ) {
    var value = '';
    for ( var prop in obj ) {
        value += obj[ prop ];
    }
    return value;
}