/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* Masonry conf */
jQuery(document).ready(function($){
    var $container = $('#main');
    
    $container.imagesLoaded(function(){
        $container.masonry({
            itemSelector : '.post',
            isFitWidth: true,
            isAnimated: true
        });
    });
            
});

