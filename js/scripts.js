(function($){
  var ct_scroll_position =0;
  $(document).scroll(function(){
    ct_scroll_position = $(this).scrollTop();
    if (ct_scroll_position > 100) {
      $("body").addClass('is-scrolled');
    } else {
        $("body").removeClass('is-scrolled');
    }
      });


}(jQuery));
