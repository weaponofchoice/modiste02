$(document).ready(function(){if($("body.single-product").length>0&&$(".thumbnails a").length>1){var s=$(".images"),e=$(".thumbnails");s.addClass("slider"),s.append('<div class="slider-controls"></div>'),$(".product .slider-controls").append('<a class="slider-prev"></a>'),$(".product .slider-controls").append('<a class="slider-next"></a>'),e.addClass("slider-images"),$(e).attr("id","productImages");var t=document.querySelector("#productImages"),i=new MutationObserver(function(s){s.forEach(function(s){var e=s.target;if($(e).find("li").length<1){contents=$(e).find("a"),contents.click(function(s){s.preventDefault()}),contents.wrap("<li></li>"),$(".single-product .images").slider({lightbox:!1,bullets:!1,keys:!1,buttons:!1});var t=$(".product .slider-prev"),i=$(".product .slider-next");t.click(function(){console.log("prev");var s=$(this).closest(".slider"),e=s.find(".is-active");if(e.hasClass("last"))var t=s.find(".first");else var t=e.next();e.removeClass("is-active"),t.addClass("is-active")}),i.click(function(){console.log("next");var s=$(this).closest(".slider"),e=s.find(".is-active");if(e.hasClass("first"))var t=s.find(".last");else var t=e.prev();e.removeClass("is-active"),t.addClass("is-active")})}})}),a={attributes:!0,childList:!0,characterData:!0};i.observe(t,a)}});