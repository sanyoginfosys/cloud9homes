"use strict";

// Class definition
var KTWizard2 = function () {
    // Base elements
    var wizardEl;
    var formEl;
    var validator;
    var wizard;
    
    // Private functions
    var initWizard = function () {
        // Initialize form wizard
        wizard = new KTWizard('kt_wizard_v2', {
            startStep: 1,
        });

        // Validation before going to next page
        wizard.on('beforeNext', function(wizardObj) {
            if (validator.form() !== true) {
                wizardObj.stop();  // don't go to the next step
            }

            if(wizard.currentStep == 1){

                document.getElementById("step2_dynamic").innerHTML = "<b>Loading, Please wait...</b><div class='kt-spinner kt-spinner--lg kt-spinner--dark' style='width: 150px; height: 150px;'></div>";

                var http = new XMLHttpRequest();
                var url = 'sec_api/amazon_req.php?isin=';
                http.open("GET", url + document.getElementById("isincode").value, true);
                http.send();

                http.onreadystatechange=function () {
                    if(this.readyState==4 && this.status==200){
                        document.getElementById("step2_dynamic").innerHTML = http.responseText;
                        if($("#prod_exists_al").length){
                            alert("Product already exists");
                            wizard.stop();
                        }
                    }
                }
            }

            if(wizard.currentStep == 2){
                if($("#prod_exists_al").length){
                    alert("Product already exists, Please choose any other product.");
                    wizard.stop();
                }
            }

        })

        // Change event
        wizard.on('change', function(wizard) {
            KTUtil.scrollTop();    
        });
    }

    var initValidation = function() {
        validator = formEl.validate({
            // Validate only visible fields
            ignore: ":hidden",

            // Validation rules
            rules: {
               	//= Step 1
				isincode: {
					required: true 
				},

				//= Step 2
                product_title: {
					required: true 
				},
                product_price: {
					required: true
				},

				//= Step 3
                product_margin: {
					required: true
				},
            },
            
            // Display error  
            invalidHandler: function(event, validator) {     
                KTUtil.scrollTop();

            },

            // Submit valid form
            submitHandler: function (form) {
                
            }
        });   
    }

    var initSubmit = function() {
        var btn = formEl.find('[data-ktwizard-type="action-submit"]');

        btn.on('click', function(e) {
            e.preventDefault();

            if (validator.form()) {
                var http = new XMLHttpRequest();
                var url = 'sec_api/upload_prod.php';
                http.open("POST", url, true);
                http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                var img_data = $('#product_image_display').attr("src");
                var prod_title = document.getElementById('product_title').value;
                var prod_desc = document.getElementById('product_desc').innerHTML;
                var prod_desc = prod_desc.replace('&amp;', 'and');
                var prod_desc = prod_desc.replace("'", '');
                var prod_price = document.getElementById('product_price').value;
                var prod_margin = document.getElementById('product_margin').value;
                var prod_isin = document.getElementById('isincode').value;
                var payload = "imagedata=" + img_data + "&title=" + prod_title + "&desc=" + prod_desc + "&price=" + prod_price + "&margin=" + prod_margin + "&isin=" + prod_isin;
                http.send(payload);
                //console.log(payload);

                http.onreadystatechange=function () {
                    if(this.readyState==4 && this.status==200){
                        alert(http.responseText);
                        if(http.responseText == "true"){
                            alert("Product uploaded successfully.");
                        }   else    {
                            //console.log(http.responseText);
                            alert("Unknown error occured. Please try again with other product.");
                        }
                    }
                }
            }
        });
    }

    return {
        // public functions
        init: function() {
            wizardEl = KTUtil.get('kt_wizard_v2');
            formEl = $('#kt_form');

            initWizard(); 
            initValidation();
            initSubmit();
        }
    };
}();

jQuery(document).ready(function() {    
    KTWizard2.init();
});