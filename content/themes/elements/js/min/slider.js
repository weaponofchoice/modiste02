!function(s){s.fn.slider=function(i){return this.each(function(){var e=s.extend({click:!0,buttons:!0,keys:!0,swipe:!0,bullets:!0,lightbox:!0},i);$this=s(this);var a=($this.find(".slider-images"),$this.find(".slider-images li")),t=$this.find(".slider-bullets"),l=$this.find(".slider-bullets li"),d=$this.find(".slider-controls"),r=$this.find(".slider-next"),n=$this.find(".slider-prev");if(a.first().addClass("first-image first is-active"),l.first().addClass("first-bullet first is-active"),a.last().addClass("last-image last"),l.last().addClass("last-bullet last"),e.click===!0&&a.click(function(){var i=s(this).closest(".slider"),e=i.find(".is-active");if(e.hasClass("last"))var a=i.find(".first");else var a=e.next();e.removeClass("is-active"),a.addClass("is-active")}),e.buttons===!0?(r.unbind("click").click(function(){var i=s(this).closest(".slider"),e=i.find(".is-active");if(e.hasClass("last"))var a=i.find(".first");else var a=e.next();e.removeClass("is-active"),a.addClass("is-active")}),n.unbind("click").click(function(){var i=s(this).closest(".slider"),e=i.find(".is-active");if(e.hasClass("first"))var a=i.find(".last");else var a=e.prev();e.removeClass("is-active"),a.addClass("is-active")})):d.hide(),e.keys===!0&&s(window).unbind("keydown").keydown(function(i){if(39===i.which){var e=s(".is-active");if(e.hasClass("last"))var a=s(".first");else var a=e.next();e.removeClass("is-active"),a.addClass("is-active")}if(37===i.which){var e=s(".is-active");if(e.hasClass("first"))var a=s(".last");else var a=e.prev();e.removeClass("is-active"),a.addClass("is-active")}}),e.swipe===!0&&(a.on("swipeleft",function(){var i=s(this).closest(".slider"),e=i.find(".is-active");if(e.hasClass("last"))var a=i.find(".first");else var a=e.next();e.removeClass("is-active"),a.addClass("is-active")}),a.on("swiperight",function(){var i=s(this).closest(".slider"),e=i.find(".is-active");if(e.hasClass("first"))var a=i.find(".last");else var a=e.prev();e.removeClass("is-active"),a.addClass("is-active")})),e.bullets===!0?(l.click(function(){var i=s(this).index()+1,e=s(this).parent().parent(),a=e.find(".is-active"),t=e.find(".slider-images li:nth-child("+i+")"),l=e.find(".slider-bullets li:nth-child("+i+")");a.removeClass("is-active"),t.addClass("is-active"),l.addClass("is-active")}),a.length<2&&(t.hide(),d.hide())):t.hide(),e.lightbox===!0){var c=s(this).closest(".slider"),v=c.find(".lightbox-open"),f=c.find(".lightbox-close"),h=s(this);v.click(function(){h.addClass("is-zoomed"),f.click(function(){h.removeClass("is-zoomed");var i=h.width();h.css("height",.75*i),s("#order").css("height",.75*i)})})}})}}(jQuery);