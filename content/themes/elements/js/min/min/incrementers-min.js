$(document).ready(function(){var n,a=$('input[type="number"]');for(i=0;i<a.length;i++){n=$(a[i]),n.wrap('<div class="incrementer"></div>'),n.parent().prepend('<span class="min">-</span>'),n.parent().append('<span class="plus">+</span>');var t=n.parent().find(".min"),p=n.parent().find(".plus");t.click(function(){var n=$(this).parent().find("input").attr("value");n>0&&(n=parseFloat(n)-1),$(this).parent().find("input").attr("value",n)}),p.click(function(){var n=$(this).parent().find("input").attr("value");n=parseFloat(n)+1,$(this).parent().find("input").attr("value",n)})}});