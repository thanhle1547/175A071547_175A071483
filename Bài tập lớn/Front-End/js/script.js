/* //Get the button:
var mybutton = document.getElementById("back-to-top");
// mybutton.onclick = topFunction();
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = scrollFunction();

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
} */

$(document).ready(function(){
  var app_header = $('.app-header');
  $(window).scroll(function(e){
    if(app_header.offset().top !== 0) {
      if (!app_header.hasClass('shadow'))
        app_header.addClass('shadow');
    }
    else
      app_header.removeClass('shadow');
  });

  var submenu_title = $('.submenu-title');
  submenu_title.click(function(){
    let submenu = submenu_title.next();
    if (submenu.hasClass('show'))
      submenu.removeClass('show');
    else
      submenu.addClass('show');
  });

  var btn_menu = $('#btn-menu');
  var nav_right = $('.nav-right');
  btn_menu.click(function(){
    if (!btn_menu.is(':checked'))
      nav_right.removeClass('hide');
    else
      nav_right.addClass('hide');
  });
});
