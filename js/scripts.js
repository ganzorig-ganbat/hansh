'use strict';

$(function () {

  $('.marquee').marquee({
    duration: 20000,
    gap:0,
    duplicated: true
  });

  var $radio = $('input[type=radio][name=mainradio]');
  var $anhaa = $('#anhaa');

  $radio.on('change', function(){
    if (this.value == 'online') {
      $anhaa.hide();
    }else{
      $anhaa.show();
    }
  });

});