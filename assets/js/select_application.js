$(document).ready(function(){
		    $('#select1').change(function(){
		        $(this).find("option:selected").each(function(){
		            var optionValue = $(this).attr("value");
		            if(optionValue){
		                $(".box").not("." + optionValue).hide();
		                $("." + optionValue).show();
		            } else{
		                $(".box").hide();
		            }
		        });
		    }).change();
		});