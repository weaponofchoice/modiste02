$(document).ready(function(){$("td.value div:not(.option-placeholder)").hide();var e=$("td.value");for(a=0;a<e.length;a++)if($(e[a]).find('input[checked="checked"]').length>0){var o=$(e[a]).find('input[checked="checked"]')[0].value.replace(/-/g," ");$(e[a]).prepend('<div class="option-placeholder">'+o+"</div>")}else $(e[a]).prepend('<div class="option-placeholder">Choose option</div>');var n=$("label");n.on("click",function(){var e=$(this).parents("tr"),o=e.find(".option-placeholder"),n=$(this).text();o.html(n),e.find(".option-placeholder").show(),e.find("div:not(.option-placeholder)").hide()});var i=$(".option-placeholder");i.on("click",function(){var e=$(this).parents("td.value");e.find(".option-placeholder").hide(),e.find("div:not(.option-placeholder)").show()});var t=$(".button#inquiry");t.on("click",function(){for($("#product-inquiry").show(),a=0;a<e.length;a++){var o=$(e[a]).find(".option-placeholder").text();o=o.replace(/-/g," ");var n=$(e[a]).parent().find(".label label").attr("for").substring(3);n=n.replace(/-/g,""),$(".option-"+n+" span").html(o),$('input[name="option_'+n+'"]').attr("value",o)}})});