<div class="signtaure-popup modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModal1Label">Please type your full name below:</h4>
            </div>
            <div class="modal-body">
                <canvas id="sig-canvas" width="465" height="118" style="display:none;"></canvas>
                <input type="hidden" id="sig-dataUrl" name="sig_dataUrl">

                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link" id="sign-type-tab" data-bs-toggle="tab" data-bs-target="#type-tab" type="button" role="tab" aria-controls="type-tab" aria-selected="false">Type</button>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade type active show" id="type-tab" role="tabpanel" aria-labelledby="sign-type-tab">
                        <div class="sign-inner-part">
                            <div class="sign-type-area">
                                <textarea id="sig-name" rows="1" cols="50" placeholder="Signature"></textarea>
                            </div>

                            <div class="common-head-here">
                                <!-- <p>Sign Here</p> -->
                                <p class="clear-button" id="sig-clearBtn">Clear Signature</p>
                            </div>

                            <div id="font-options">
                                <div class="font-option-block">
                                 
                                    <div class="font-option-list">
                                        <input type="radio" id="font-betterlett" name="sig-font" value="betterlett" checked>
                                        <label for="font-betterlett"><span style="font-family:betterlett;">Stenley Signature for personal use</span></label>
                                    </div>

                                    <div class="font-option-list">
                                        <input type="radio" id="font-brittanysignature" name="sig-font" value="brittanysignature" checked>
                                        <label for="font-brittanysignature"><span style="font-family:Brittanysignature;">Brittany Signature</span></label>
                                    </div>

                                    <div class="font-option-list">
                                        <input type="radio" id="font-brothersignature" name="sig-font" value="brothersignature" checked>
                                        <label for="font-brothersignature"><span style="font-family:BrotherSignature;">Brother Signature</span></label>
                                    </div>

                                    <div class="font-option-list">
                                        <input type="radio" id="font-barethellysignature" name="sig-font" value="barethellysignature" checked>
                                        <label for="font-barethellysignature"><span style="font-family:barethellysignature;">Barethelly Signature</span></label>
                                    </div>

                                    <div class="font-option-list">
                                        <input type="radio" id="font-brightsunshine" name="sig-font" value="brightsunshine" checked>
                                        <label for="font-brightsunshine"><span style="font-family:BrightSunshine;">Bright Sunshine</span></label>
                                    </div>

                                    <div class="font-option-list">
                                        <input type="radio" id="font-brotherlandsignature" name="sig-font" value="brotherlandsignature" checked>
                                        <label for="font-brotherlandsignature"><span style="font-family:BrotherlandSignature;">Brotherland Signature</span></label>
                                    </div>

                                    <div class="font-option-list">
                                        <input type="radio" id="font-therichullietta" name="sig-font" value="therichullietta" checked>
                                        <label for="font-therichullietta"><span style="font-family:TheRichullietta;">The Rich ullietta</span></label>
                                    </div>

                                    <div class="font-option-list">
                                        <input type="radio" id="font-theprestigesignature" name="sig-font" value="theprestigesignature" checked>
                                        <label for="font-theprestigesignature"><span style="font-family:ThePrestigeSignature;">The Prestige Signature</span></label>
                                    </div>

                                    <div class="font-option-list">
                                        <input type="radio" id="font-mollinasignature" name="sig-font" value="mollinasignature" checked>
                                        <label for="font-mollinasignature"><span style="font-family:MollinaSignature;">Mollina Signature</span></label>
                                    </div>

                                    <div class="font-option-list">
                                        <input type="radio" id="font-autography" name="sig-font" value="autography" checked>
                                        <label for="font-autography"><span style="font-family:autography;">Marietta Signature</span></label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary sin-close" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-primary btn-not-active" id="sig-submitBtn" disabled>Done</button>
            </div>

        </div>
    </div>
</div>

<script>

    var toastMixin, currentStep, steps, showStep;

    $(document).ready(function () {

        toastMixin = Swal.mixin({
            toast: true,
            icon: 'success',
            title: 'General Title',
            animation: false,
            position: 'top-right',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        currentStep = 0;
        steps = $(".steps_div");
        showStep = (step) => {
            steps.hide();
            steps.eq(step).show();
        }
        function validateStep(step) {
            var isValid = true;
            var currentSection = steps.eq(step);
            if (step === 0) { 
                if (false && !$('input[name="terms"]').is(':checked')) { 
                    isValid = false;
                    toastMixin.fire({
                        title: 'Please agree to the Terms of Use.',
                        icon: 'error'
                    });
                    return false;
                }
             
            }


            function validateQuizStep(step, radioGroupName) {
                if (!$('input[name="' + radioGroupName + '"]').is(':checked')) {
                    toastMixin.fire({
                        title: 'Please select an option.',
                        icon: 'error'
                    });
                    return false;
                }
                return true;
            }

            if (step == 1 && !validateQuizStep(step, 'withdrawal')) {
                isValid = false;
                return false;
            }

            if (step == 2 && !validateQuizStep(step, 'investment_knowledge')) {
                isValid = false;
                return false;
            }

            if (step == 3 && !validateQuizStep(step, 'portfolio_goal')) {
                isValid = false;
                return false;
            }

            if (step == 4 && !validateQuizStep(step, 'annual_income')) {
                isValid = false;
                return false;
            }

            if (step == 5 && !validateQuizStep(step, 'income_sources')) {
                isValid = false;
                return false;
            }

            if (step == 6 && !validateQuizStep(step, 'financial_situation')) {
                isValid = false;
                return false;
            }

            if (step == 7 && !validateQuizStep(step, 'net_worth')) {
                isValid = false;
                return false;
            }

            if (step == 8 && !validateQuizStep(step, 'investment_percentage')) {
                isValid = false;
                return false;
            }

            if (step == 9 && !validateQuizStep(step, 'age_group')) {
                isValid = false;
                return false;
            }

            if (step == 10 && !validateQuizStep(step, 'investment_decision')) {
                isValid = false;
                return false;
            }

            if (step == 11 && !validateQuizStep(step, 'investment_decline')) {
                isValid = false;
                return false;
            }

            if (step == 12 && !validateQuizStep(step, 'financial_concern')) {
                isValid = false;
                return false;
            }

            if (step == 13 && !validateQuizStep(step, 'investment_choice')) {
                isValid = false;
                return false;
            }

            if (step == 14 && !validateQuizStep(step, 'investment_loss_reaction')) {
                isValid = false;
                return false;
            }

            if (step == 15 && !validateQuizStep(step, 'investment_portfolio')) {
                isValid = false;
                return false;
            }

            return isValid;
        }
        $(".next-step").click(function () {
            if (validateStep(currentStep)) {
                $('body').removeClass('step-'+currentStep);
                currentStep++;
                showStep(currentStep);
                $('body').addClass('step-'+currentStep);
            }
        });
        $(".prev-step").click(function () {
            $('body').removeClass('step-'+currentStep);
            currentStep--;
            showStep(currentStep);
            $('body').addClass('step-'+currentStep);
        });
        showStep(currentStep);
    });
</script>


<script>
    $(document).on('change', '.up-draw', function() {
        var sigText = document.getElementById("sig-dataUrl");
        $(".review_upload").attr('id', 'review_upload_id');
        $(".submit-mfs-button").addClass('disabled');

        if ($(this).val() == 'draw') {
            $(".draw-file-div").show();
            $("#upload_signature").val("");
            $(".draw-file-div").show();
            $(".singnature-btns").hide();

        } else {
            sigText.value = "";
            $(".sin-img").attr("src", "");
            $(".draw-file-div").hide();
            $(".singnature-btns").show();
        }
    });

    $(function(){
        $('.to-result').click(function(){
            if (!$('input[name="investment_portfolio"]').is(':checked')) {
                    toastMixin.fire({
                        title: 'Please select an option.',
                        icon: 'error'
                    });
                    return false;
                }
            $(this).text('Please wait...').attr('disabled', true);
            $('.prev-step').attr('disabled', true);
            var formData = [];
            $.each($('form#wizardiq').serializeArray(), function(index, item){
                formData[item.name] = item.value;
            });
            formData['get_results'] = true;
            
            $.ajax({
                url:'process.php',
                type: 'post',
                data:$('form#wizardiq').serialize() + '&get_results=1',
                success:function(response){
                    try {
                    response = JSON.parse(response);
                    } catch (e) {
                        toastMixin.fire({
                            title: 'Something went wrong. Please try again',
                            icon: 'error'
                        });
                        $('.to-result').text('Result').attr('disabled', false);
                        $('.prev-step').attr('disabled', false);
                        return;
                    }

                    $.each(response, function(index, item){
                        $('.'+index+' span').text(item);
                    })
                    $('.to-result').text('Result').attr('disabled', false);
                    $('body').removeClass('step-'+currentStep);
                    $('.prev-step').attr('disabled', false);
                    currentStep++;
                    showStep(currentStep);
                    $('body').addClass('step-'+currentStep);
                },error: function(){
                    toastMixin.fire({
                        title: 'Something went wrong. Please try again',
                        icon: 'error'
                    });
                    $('.to-result').text('Result').attr('disabled', false);
                    $('.prev-step').attr('disabled', false);
                }
            });
        });
    })
    setTimeout(function() {
        $(document).on('change', '.up-draw', function() {
        });
    }, 600);


    function submit_form(){
        if(!$('.input-name .name').val()){
            toastMixin.fire({
                title: 'The name is required.',
                icon: 'error'
            });
            return;
        }
        $('#mfstextsubmit').text('Submitting...').attr('disabled', true);

        $.ajax({
            url:'process.php',
            type: 'post',
            data: $('form#wizardiq').serialize(),
            success:function(response){
                response = JSON.parse(response);
                if(response.success){
                    toastMixin.fire({
                        title: 'Submitted to MFS',
                        icon: 'success'
                    });
                    $('#mfstextsubmit').text('Submitted!');
                    $('#mfs_download').attr('href', response.url);
                    setTimeout(() => {
                        $('#mfstextsubmit').text('Submit To MFS').attr('disabled', false);
                        $('body').removeClass('step-'+currentStep);
                        $('.prev-step, .next-step').remove();
                        $('main').addClass('iq_main_sect_thankyou').removeClass('iq_main_sect');
                        currentStep++;
                        showStep(currentStep);
                        $('body').addClass('step-'+currentStep);
                    }, 1500);
                }else{
                    $('#mfstextsubmit').text('Try again!')
                        toastMixin.fire({
                        title: 'Something went wrong. Please try again',
                        icon: 'error'
                    });
                    setTimeout(() => {
                        $('#mfstextsubmit').text('Submit To MFS').attr('disabled', false);
                    }, 1500);
                }
            },
            error:function(response){
                toastMixin.fire({
                    title: 'Something went wrong. Please try again',
                    icon: 'error'
                });
                $('#mfstextsubmit').text('Try again!')
                setTimeout(() => {
                    $('#mfstextsubmit').text('Submit To MFS').attr('disabled', false);
                }, 1500);
                return false;
            }
        });
    }
</script>

</body>
</html>