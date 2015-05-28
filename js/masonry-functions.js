/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

jQuery(document).ready(function($) {
    
    /* Masonry settings to organize footer widgets */
    var $container = $('#main');
    var $masonryOn;
    
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
        $container.imagesLoaded(function(){
            $container.masonry({
                itemSelector: '.post',
                isFitWidth: true,
                isAnimated: true
            });
        });
    }
        
});

