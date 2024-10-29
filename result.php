

                                        <div class="row m-0">
                                            <div class="col-md-12 col-12 p-0">
                                                <div class="iq-content-box">
                                                    <div class="section-header-iq">
                                                        <h2 class="section-main-title">Investor Questionnaire</h2>
                                                        <hr class="section-header-border">
                                                    </div>

                                                    <div class="section-content">
                                                        <div class="investment-horizon-box">
                                                            <h4>Your Answers:</h4>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <div class="form-holder">
                                                                    <ul class="form-result">
                                                                        <li class="result_time_horizon"> Time Horizon: <span></span></li>
                                                                        <li class="result_investment_knowledge"> Investment Knowledge: <span></span></li>
                                                                        <li class="result_investment_objective"> Investment Objectives: <span></span></li>
                                                                        <li class="result_risk_capacity_score"> Your Risk Capacity Score is: <span></span></li>
                                                                        <li class="result_risk_tolerance_score"> Your Risk Tolerance Score is: <span></span></li>
                                                                    </ul>


                                                                    <div class="investment-horizon-box result-data">
                                                                        <hr class="section-header-border">
                                                                        <h4>Your Investor Profile Based On Your Answers:</h4>
                                                                        <a href="<?php echo SITE_URL; ?>questionnaire-scoring.php" target="_blank">Learn more about how this questionnaire is scored and an investor profile is determined.</a>
                                                                    </div>

                                                                    

                                                                    <div class="investment-horizon-box result-data">
                                                                        <h4>Conservative Investor</h4>
                                                                        <p>You have a low tolerance for risk and potential loss of capital. You are willing to accept some short-term fluctuations and small losses in your investment portfolio in exchange for modest returns. You may have also got
                                                                            this result if you have shorter investment time horizon or an investment objective of income.
                                                                        </p>
                                                                    </div>
                                                                    <div class="investment-horizon-box result-data-like">
                                                                        <h4>Does this sound like you?</h4>
                                                                        <div class="form-group radio-years mt-0">
                                                                            <div class="input-group radio-check">
                                                                                <div class="radio selection">
                                                                                    <input id="sound-like-yes" value="yes" name="sound-like" type="radio">
                                                                                    <label for="sound-like-yes" class="radio-label" style="margin: 0; line-height: 1;">Yes</label>
                                                                                </div>
                                                                                <div class="radio selection">
                                                                                    <input id="sound-like-no" value="no" name="sound-like" type="radio">
                                                                                    <label for="sound-like-no" class="radio-label" style="margin: 0; line-height: 1;">No</label>
                                                                                </div>
                                                                                <div id="sound-like-text" style="display: none;">
                                                                                    <p>Great, however remember that a questionnaire is just a starting point. Consider speaking with an advisor to have a deeper discussion about your investment goals, comfort with risk and investment return expectations.
                                                                                    </p>
                                                                                </div>
                                                                                <div id="sound-like-no-text" style="display: none;">
                                                                                    <p>Your investor profile based on the questionnaire does not match with how you would describe yourself as an investor. This questionnaire is designed to produce an investor profile that takes the lower of your willingness to accept and your ability to withstand losses while also considering other factors that may limit how much risk you can take such as your investment time horizon. You can try the investor questionnaire again, but remember <b>a questionnaire is always just a starting point, please consider speaking with an advisor to have a deeper discussion about your investment goals, comfort with risk and investment return expectations.</b>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <ul>
                                                <li><a href="javascript:void(0);" class="prev-step">Back</a>
                                                </li>
                                                <li><a href="javascript:void(0);" class="next-step">Next</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <script>
                                            $(document).ready(function() {
                                                $("#sound-like-text").hide();
                                                $("#sound-like-no-text").hide();
                                                $("#sound-like-yes").on("click", function() {
                                                    if ($(this).is(":checked")) {
                                                        $("#sound-like-text").show();  
                                                        $("#sound-like-no-text").hide(); 
                                                        $('body .section-content').animate({
                                                            scrollTop: $("#sound-like-text").offset().top
                                                        }, 1000);
                                                    }
                                                });
                                                $("#sound-like-no").on("click", function() {
                                                    if ($(this).is(":checked")) {
                                                        $("#sound-like-no-text").show(); 
                                                        $("#sound-like-text").hide();  
                                                        $('body .section-content').animate({
                                                            scrollTop: $("#sound-like-no-text").offset().top
                                                        }, 1000);
                                                    }
                                                });
                                            });
                                        </script>
       

