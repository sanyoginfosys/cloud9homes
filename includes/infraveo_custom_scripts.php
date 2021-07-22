<?php

function Infraveo_Custom_Slider_MinMax(){
	echo '<script type="text/javascript">
		function Infraveo_Custom_Slider_MinMax(slider_id, min_val, max_val){
			$( slider_id ).slider({
				 range: true,
				 min:  min_val,
				 max: max_val,
				 values: [ min_val, max_val ],
				 slide: function( event, ui ) {
					$( slider_id + "-value" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
				 }
			});
			$( slider_id + "-value" ).val( $( slider_id ).slider( "values", 0 ) + " - " + $( slider_id ).slider( "values", 1 ) );
			return false;
		}
	</script>';
}

function Infraveo_Homepage_DynamicSuburb_List_bkup(){
	echo '<script type="text/javascript">
		$(document).ready(function(){
			$("#xstatex1").on("change",function(){
				$(".dyn_suburb1").css({"display":"none"});
				$(".loader-icon-top-suburb").css({"display":""});
		        var stateid = $(this).val();
		        if(stateid){
		            $.ajax({
		                type:"POST",
		                url:"ajax.php",
		                data:"state_id="+stateid,
		                success:function(data){
		                    $("#dyn_suburb1").empty().html(data);
		                    $("#dyn_suburb1").selectpicker("refresh");
		                    $(".dyn_suburb1").css({"display":""});
							$(".loader-icon-top-suburb").css({"display":"none"});
		                }
		            }); 
		        }
		        else{
		            $("#dyn_suburb1").text("Error Occured! Please try again."); 
		        }
			});
			function fetchCity(count){
				alert(count.length);
				$(".dyn_suburb1").css({"display":"none"});
				$(".loader-icon-top-suburb").css({"display":""});
		        var stateid = $(this).val();
		        if(stateid){
		            $.ajax({
		                type:"POST",
		                url:"ajax.php",
		                data:"state_id="+stateid,
		                success:function(data){
		                    $("#dyn_suburb1").empty().html(data);
		                    $("#dyn_suburb1").selectpicker("refresh");
		                    $(".dyn_suburb1").css({"display":""});
							$(".loader-icon-top-suburb").css({"display":"none"});
		                }
					});
				}
			}

		    $("#xstatex2").on("change",function(){
		    	$(".dyn_suburb1").css({"display":"none"});
				$(".loader-icon-top-suburb").css({"display":""});
		        var stateid = $(this).val();
		        if(stateid){
		            $.ajax({
		                type:"POST",
		                url:"ajax.php",
		                data:"state_id="+stateid,
		                success:function(data){
		                    $("#dyn_suburb2").empty().html(data);
		                    $("#dyn_suburb2").selectpicker("refresh");
		                     $(".dyn_suburb1").css({"display":""});
							$(".loader-icon-top-suburb").css({"display":"none"});
		                }
		            }); 
		        }
		        else{
		            $("#dyn_suburb2").text("Error Occured! Please try again."); 
		        }
		    });

		    $("#xstatex3").on("change",function(){
		    	$(".dyn_suburb1").css({"display":"none"});
				$(".loader-icon-top-suburb").css({"display":""});
		        var stateid = $(this).val();
		        if(stateid){
		            $.ajax({
		                type:"POST",
		                url:"ajax.php",
		                data:"state_id="+stateid,
		                success:function(data){
		                    $("#dyn_suburb3").empty().html(data);
		                    $("#dyn_suburb3").selectpicker("refresh");
		                     $(".dyn_suburb1").css({"display":""});
							$(".loader-icon-top-suburb").css({"display":"none"});
		                }
		            }); 
		        }
		        else{
		            $("#dyn_suburb3").text("Error Occured! Please try again."); 
		        }
		    });

		    $("#xstatex4").on("change",function(){
		    	$(".dyn_suburb1").css({"display":"none"});
				$(".loader-icon-top-suburb").css({"display":""});
		        var stateid = $(this).val();
		        if(stateid){
		            $.ajax({
		                type:"POST",
		                url:"ajax.php",
		                data:"state_id="+stateid,
		                success:function(data){
		                    $("#dyn_suburb4").empty().html(data);
		                    $("#dyn_suburb4").selectpicker("refresh");
		                     $(".dyn_suburb1").css({"display":""});
							$(".loader-icon-top-suburb").css({"display":"none"});
		                }
		            }); 
		        }
		        else{
		            $("#dyn_suburb4").text("Error Occured! Please try again."); 
		        }
		    });

		    $("#xstatex5").on("change",function(){
		    	$(".dyn_suburb1").css({"display":"none"});
				$(".loader-icon-top-suburb").css({"display":""});
		        var stateid = $(this).val();
		        if(stateid){
		            $.ajax({
		                type:"POST",
		                url:"ajax.php",
		                data:"state_id="+stateid,
		                success:function(data){
		                    $("#dyn_suburb5").empty().html(data);
		                    $("#dyn_suburb5").selectpicker("refresh");
		                     $(".dyn_suburb1").css({"display":""});
							$(".loader-icon-top-suburb").css({"display":"none"});
		                }
		            }); 
		        }
		        else{
		            $("#dyn_suburb5").text("Error Occured! Please try again."); 
		        }
		    });

		    $("#xstatex6").on("change",function(){
		    	$(".dyn_suburb1").css({"display":"none"});
				$(".loader-icon-top-suburb").css({"display":""});
		        var stateid = $(this).val();
		        if(stateid){
		            $.ajax({
		                type:"POST",
		                url:"ajax.php",
		                data:"state_id="+stateid,
		                success:function(data){
		                    $("#dyn_suburb6").empty().html(data);
		                    $("#dyn_suburb6").selectpicker("refresh");
		                     $(".dyn_suburb1").css({"display":""});
							$(".loader-icon-top-suburb").css({"display":"none"});
		                }
		            }); 
		        }
		        else{
		            $("#dyn_suburb6").text("Error Occured! Please try again."); 
		        }
		    });
		});
	</script>';
}

function Infraveo_Homepage_DynamicSuburb_List(){
	echo '<script type="text/javascript">
		$(document).ready(function(){
			$(\'input.typeahead\').typeahead({
				name: \'typeahead\',
				remote:\'ajax.php?key=%QUERY\',
				limit : 10
			});
			$("#xstatex1").on("change",function(){
				$(".dyn_suburb1").css({"display":"none"});
				$(".loader-icon-top-suburb").css({"display":""});
		        var stateid = $(this).val();
		        if(stateid){
					$("#dyn_suburb1").attr("readonly", false);
					$("#dyn_suburb1").attr("placeholder", "Enter Suburb or Postcode");
		        }
		        else{
		            $("#dyn_suburb1").text("Error Occured! Please try again."); 
		        }
			});

		    $("#xstatex2").on("change",function(){
		    	$(".dyn_suburb1").css({"display":"none"});
				$(".loader-icon-top-suburb").css({"display":""});
		        var stateid = $(this).val();
		        if(stateid){
					$("#dyn_suburb2").attr("readonly", false);
					$("#dyn_suburb2").attr("placeholder", "Enter Suburb or Postcode");
		        }
		        else{
		            $("#dyn_suburb2").text("Error Occured! Please try again."); 
		        }
		    });

		    $("#xstatex3").on("change",function(){
		    	$(".dyn_suburb1").css({"display":"none"});
				$(".loader-icon-top-suburb").css({"display":""});
		        var stateid = $(this).val();
		        if(stateid){
					$("#dyn_suburb3").attr("readonly", false);
					$("#dyn_suburb3").attr("placeholder", "Enter Suburb or Postcode");
		        }
		        else{
		            $("#dyn_suburb3").text("Error Occured! Please try again."); 
		        }
		    });

		    $("#xstatex4").on("change",function(){
		    	$(".dyn_suburb1").css({"display":"none"});
				$(".loader-icon-top-suburb").css({"display":""});
		        var stateid = $(this).val();
		        if(stateid){
					$("#dyn_suburb4").attr("readonly", false);
					$("#dyn_suburb4").attr("placeholder", "Enter Suburb or Postcode");
		        }
		        else{
		            $("#dyn_suburb4").text("Error Occured! Please try again."); 
		        }
		    });

		    $("#xstatex5").on("change",function(){
		    	$(".dyn_suburb1").css({"display":"none"});
				$(".loader-icon-top-suburb").css({"display":""});
		        var stateid = $(this).val();
		        if(stateid){
					$("#dyn_suburb5").attr("readonly", false);
					$("#dyn_suburb5").attr("placeholder", "Enter Suburb or Postcode");
		        }
		        else{
		            $("#dyn_suburb5").text("Error Occured! Please try again."); 
		        }
		    });

		    $("#xstatex6").on("change",function(){
		    	$(".dyn_suburb1").css({"display":"none"});
				$(".loader-icon-top-suburb").css({"display":""});
		        var stateid = $(this).val();
		        if(stateid){
					$("#dyn_suburb6").attr("readonly", false);
					$("#dyn_suburb6").attr("placeholder", "Enter Suburb or Postcode");
		        }
		        else{
		            $("#dyn_suburb6").text("Error Occured! Please try again."); 
		        }
		    });
		});
	</script>';
}