/**
 * Created by Stéphanie on 22/01/2016.
 */

// On document ready:

//$(function(){
//
//     //Instantiate MixItUp:
//
//    $('#Container').mixItUp({
//        effects: ['fade','scale','rotateZ']
//    });
//});


//Scroll

(function($){

    //Je crée le tableau des sections et les variables utiles
    var sections= [];
    var id = false;
    var $navbar = $('.ls-nav');
    var $navbarA = $('a', $navbar);


    //J'ecoute evenement
    $navbarA.click(function(e){
       $('html, body').animate({
           scrollTop: $($(this).attr('href')).offset().top- 80
       });
    });
    //Je récupère ds mon menu les href: #
    $navbarA.each(function(){
        sections.push($($(this).attr('href')));
        console.log(sections);
    });

    //J'ecoute la position du scroll
    $(window).scroll(function(e){
        var scrollTop = $(this).scrollTop() + ($(window).height() / 2);

        for(var i in sections){
            var section = sections[i];

            if(scrollTop > section.offset() ){
                var scrolled_id = section.attr('id');
            }
        }
        if(scrolled_id !== id){
            id = scrolled_id;

            $navbarA.removeClass('activeNav');
            $('a[href="#' + id + '"]',$navbar).addClass('activeNav');
            console.log('Menu changé pour : ' + id);
        }

    });

})(jQuery);





(function($){
    //Menu
    $('#toggle').click(function(e){
        e.preventDefault();
        $('.site-container').toggleClass('sideBarResponsive');
    })
})(jQuery);




hash = function(h){
    if(history.pushState){
        history.pushState(null, null, h);
    }else {
        location.hash = h;
    }
};



