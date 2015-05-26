/* 
 * JavaScript functions doc
 */

jQuery(document).ready(function($) {
    
    /* Masonry settings to organize footer widgets */
    var $container = $('#footer-widgets');
    var $masonryOn;
    var $columnWidth = 400;
    
    if ( $(document).width() > 879 ) {
        $masonrOn = true;
        runMasonry();
    }
    
    $(window).resize( function () {
        if( $(document).width() < 879 ) {
            if ( $masonryOn ) {
                $container.masonry('destroy');
                $masonryOn = false;
            } else {
                $masonryOn = true;
                runMasonry();
            }
        }
    });
    
    function runMasonry() {
        $container.masonry({
            comlumnWidth: $columnWidth,
            itemSelector: '.widget',
            isFitWidth: true,
            isAnimated: true
        });
    }
    
    /* Toggles the header search on and off */
    $('.search-toggle').click(function() {
        $('#search-container').slideToggle('slow', function() {
            $('.search-toggle').toggleClass('active');
        });
    });
    
});

