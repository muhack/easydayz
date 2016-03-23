/* Thanks to CSS Tricks for pointing out this bit of jQuery
http://css-tricks.com/equal-height-blocks-in-rows/
It's been modified into a function called at page load and then each time the page is resized. One large modification was to remove the set height before each new calculation. */

equalheight = function(maincontainer,container){
var currentTallest = 0,
     currentRowStart = 0,
     rowDivs = new Array(),
     $el,
     minheight=jQuery(maincontainer).css('min-height'),
     topPosition = 0;
 jQuery(container).each(function() {

   $el = jQuery(this);
   jQuery($el).height('auto')
   topPosition = $el.position().top;

   if (currentRowStart != topPosition) {
     for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
       rowDivs[currentDiv].height(currentTallest);
     }
     rowDivs.length = 0; // empty the array
     currentRowStart = topPosition;
     currentTallest = $el.height();
     rowDivs.push($el);
   } else {
     rowDivs.push($el);
     currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
  }
  if(minheight==''){
    minheight=currentTallest+"px";
  }
  if(minheight<(currentTallest+"vh")){
    minheight=currentTallest+"px";
  }
   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
        rowDivs[currentDiv].css({
          "min-height" : minheight,
        });
   }
 });
}

jQuery(window).load(function() {
  equalheight('.pairheight','.pairheight > *');
});


jQuery(window).resize(function(){
  equalheight('.pairheight','.pairheight > *');
});
