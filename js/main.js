/* Signature */
setTimeout(() => {
    var sigName = document.getElementById("sig-name");
    var sigSubmitBtn = document.getElementById("sig-submitBtn");
    var sigClearBtn = document.getElementById("sig-clearBtn");
    var fontOptions = document.querySelectorAll('input[name="sig-font"]');
    var fontLabels = document.querySelectorAll('#font-options label');
    var sigText = document.getElementById("sig-dataUrl");
    var sigImage = document.getElementById("sig-image");


    var uploadSignatureInput = document.getElementById("upload_signature");
    var drawSignatureRadio = document.getElementById("draw");
    var chooseSignatureRadio = document.getElementById("upload");

    var sigSubmitBtn2 = document.getElementsByClassName("step-11-disable");


    var sigSubmitBtn3 = document.getElementsByClassName("submit-mfs-button");
    var reviewUpload = document.getElementsByClassName("review_upload");

    function toggleSubmitButton() {
        var hasSignature = sigText.value.trim() !== "" || uploadSignatureInput.files.length > 0;

        for (var i = 0; i < sigSubmitBtn2.length; i++) {
            sigSubmitBtn2[i].classList.add("disabled");
        }

         
        if (hasSignature) {
            for (var i = 0; i < sigSubmitBtn3.length; i++) {
                sigSubmitBtn3[i].classList.remove("disabled");
                sigSubmitBtn3[i].disabled = false;
            }

            for (var i = 0; i < reviewUpload.length; i++) {
                reviewUpload[i].removeAttribute("id");
            }
        } else {
            for (var i = 0; i < sigSubmitBtn3.length; i++) {
                sigSubmitBtn3[i].classList.add("disabled");
                sigSubmitBtn3[i].disabled = true;
            }

            for (var i = 0; i < reviewUpload.length; i++) {
                reviewUpload[i].setAttribute("id", "review_upload_id");
            }
        }
    }

    document.getElementById("upload_signature").addEventListener("change", toggleSubmitButton);
  
    function updateFontPreview() {
        var selectedFont = document.querySelector('input[name="sig-font"]:checked');
        if (selectedFont) {
            sigName.style.fontFamily = selectedFont.value + ', Arial, sans-serif';
        }
    }

    function toggleClearButton() {
        var hasText = sigName.value.trim() !== "";
        sigClearBtn.style.display = hasText ? "inline-block" : "none";
        sigSubmitBtn.disabled = !hasText;

        sigSubmitBtn3.disabled = !hasText;

        if (hasText) {
            sigSubmitBtn.classList.add("btn-active");
            sigSubmitBtn.classList.remove("btn-not-active");
        } else {
            sigSubmitBtn.classList.add("btn-not-active");
            sigSubmitBtn.classList.remove("btn-active");

        }
    }

    function updatePreviews() {
        var name = sigName.value.trim(); 

        for (var i = 0; i < fontLabels.length; i++) {
            var font = fontLabels[i].htmlFor.replace("font-", "").replace("-", " ");

            fontLabels[i].innerHTML = '<span style="font-family: ' + font + ';">' + (name || 'Signature') + '</span>';
        }
    }

    updateFontPreview();
    updatePreviews();
    toggleClearButton();

    sigName.addEventListener("input", function() {
        toggleClearButton();
        updatePreviews();

        var hasText = sigName.value.trim() == "";
        if (hasText) {
            sigText.value = "";
            sigText.innerHTML = "";
        }


        toggleSubmitButton();
    });

    fontOptions.forEach(function(option) {
        option.addEventListener("change", function() {
            updateFontPreview();
            updatePreviews();
        });
    });

    sigClearBtn.addEventListener("click", function (e) {
        e.preventDefault();
        sigName.value = "";
        sigText.value = "";
        sigText.innerHTML = "";
        updateFontPreview();
        toggleClearButton();
        updatePreviews();

        toggleSubmitButton();

        $(sigSubmitBtn).addClass("btn-not-active");
        $(sigSubmitBtn).removeClass("btn-active");

        

        $(".sin-img").attr("src", "");

        var formData = new FormData();
        formData.append('action', 'del_signature');
        formData.append('id', $("#wizard [name='id']").val());
        $.ajax({
            url: 'process.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.status === 'success') {
                
                }
            },
            error: function(xhr, status, error) {
                $('#response').html('<p>An error occurred: ' + error + '</p>');
            }
        });
    }, false);


    function createImageFromText(text) {
        var canvas = $('<canvas id="text-canvas" style="display:none;"></canvas>').appendTo('body')[0];
        var context = canvas.getContext('2d');
       
        var fontSize = 36;
		var computedStyle = window.getComputedStyle(sigName);
        var fontFamily = computedStyle.fontFamily;
        context.font = fontSize + 'px ' + fontFamily;
        
        var textWidth = context.measureText(text).width + 20; 
		var lineSpacingFactor = 2; 
		var canvasHeight = fontSize * lineSpacingFactor ; 
        var canvasWidth = Math.min(textWidth, window.innerWidth - 40);
		canvas.width = canvasWidth;
		canvas.height = canvasHeight;

        canvas.width = canvasWidth;
        canvas.height = canvasHeight;

        context.clearRect(0, 0, canvasWidth, canvasHeight);

        context.fillStyle = '#FFFFFF'; 
        context.fillRect(0, 0, canvasWidth, canvasHeight);

        context.font = fontSize + 'px ' + fontFamily;
        context.textAlign = 'center';
        context.textBaseline = 'middle';

        var x = canvasWidth / 2;

        context.fillStyle = '#000000'; 
        context.fillText(text, x, canvasHeight / 2);

        return canvas.toDataURL('image/png');
    }

    function clearCanvas() {
        var canvas = document.createElement("canvas");
        var context = canvas.getContext("2d");
        canvas.width = canvas.width;
        context.strokeStyle = "#000000";
        context.lineWidth = 4;
    }

    sigSubmitBtn.addEventListener("click", function (e) {
        $(this).removeClass("btn-not-active");
        $(this).addClass("btn-active");
        
        e.preventDefault();

        var text = sigName.value.trim();
        if (text) {
            var dataUrl = createImageFromText(text);
            sigText.innerHTML = dataUrl;
            sigText.value = dataUrl;
            $(".sin-img").attr('src', dataUrl);
            $("#sign").val(dataUrl);
        }

        /* var wizard_id = $("#wizard [name='id']").val();
        if (wizard_id.length > 0) {
            var formData = new FormData();

            formData.append('full_name', $("#wizard [name='full_name']").val());
            formData.append('action', $("#wizard [name='action']").val());
            formData.append('id', $("#wizard [name='id']").val());
            formData.append('final_expense', $("#wizard [name='final_expense']").val());
            formData.append('mortgages', $("#wizard [name='mortgages']").val());
            formData.append('personal_loan', $("#wizard [name='personal_loan']").val());
            formData.append('other_debts', $("#wizard [name='other_debts']").val());
            formData.append('education_fund', $("#wizard [name='education_fund']").val());
            formData.append('day_to_day_exp', $("#wizard [name='day_to_day_exp']").val());
            formData.append('association_coverage', $("#wizard [name='association_coverage']").val());
            formData.append('personal_coverage', $("#wizard [name='personal_coverage']").val());
            formData.append('monetary_asset', $("#wizard [name='monetary_asset']").val());
            formData.append('factor', $("#wizard [name='factor']").val());
            formData.append('sig_dataUrl', $("[name='sig_dataUrl']").val());
            formData.append('shortfall_funds', $("#wizard [name='shortfall_funds']").val());

            var fileInput = $('#upload_signature')[0].files[0];

            if (fileInput) {
                if (fileInput.size > 50 * 1024) {
                    alert("File size exceeds the limit of 50KB");
                    return;
                } else {
                    formData.append('upload_signature', fileInput);
                }

                var reader = new FileReader();
                reader.onload = function(e) {
                    var base64URL = e.target.result;
                    formData.append('upload_signature', base64URL);

                    $.ajax({
                        url: 'process.php',
                        type: 'POST',
                        data: formData,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            if (data.status === 'success') {
                            
                            } else {

                            }
                        },
                        error: function(xhr, status, error) {
                            $('#response').html('<p>An error occurred: ' + error + '</p>');
                        }
                    });
                };
                reader.readAsDataURL(fileInput);
            } else {

                $.ajax({
                    url: 'process.php',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.status === 'success') {

                            if (data.url) {
           
                            }
                        } else {

                        }
                    },
                    error: function(xhr, status, error) {
                        $('#response').html('<p>An error occurred: ' + error + '</p>');
                    }
                });
            }
            sigSubmitBtn.disabled = true;
            sigSubmitBtn3.disabled = true;
        }
         */
        updateFontPreview();
        toggleClearButton();
        toggleSubmitButton();
        jQuery(".sin-close").trigger("click")
    });

    $(document).on('change','.up-draw',function() {
        var sigText = document.getElementById("sig-dataUrl");
        $(".review_upload").attr('id','review_upload_id');
        $(".submit-mfs-button").addClass('disabled');

        if($(this).val()=='draw'){
            $(".draw-file-div").show();
            $("#upload_signature").val("");
            $(".draw-file-div").show();
            $(".singnature-btns").hide();
            
        }else{
            clearCanvas();
            sigText.value = "";

            $(".sin-img").attr("src","");

            $(".draw-file-div").hide();
            $(".singnature-btns").show();
        }
    });
}, 600);