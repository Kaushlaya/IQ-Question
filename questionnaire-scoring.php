<?php include "header.php"; ?>

    <main class="iq_main_sect">
        <div class="site-content-iq site-content-scoring-iq" style="background: url('<?php echo SITE_URL; ?>images/iq-main-bg.webp'); height:max-content;">
            <div class="page-wrapper-iq">
                <div class="iq-main-block">
                    <div class="iq_main">
                        <div class="main-page-iq">
                            <div class="row m-0">
                                <div class="col-12 p-0 text-center">
                                    <a href="<?php echo SITE_URL?>" class="header-link-sec">
                                        <div class="section-logo-header">
                                            <div class="logo-image">
                                                <img class="logo_mains" src="<?php echo SITE_URL?>images/mfs-logo.webp" alt="Logo">
                                            </div>
                                            <p class="logo_subtitles">Your gold standard for service and planning excellence.
                                            </p>
                                        </div>
                                    </a>
                                    <div class="iq-multistep-wizards">
                                        <section class="steps_div steps_div_results">
                                            <div class="row m-0">
                                                <div class="col-md-12 col-12 p-0">
                                                    <div class="iq-content-block">
                                                        <div class="section-header-iq">
                                                            <h2 class="section-main-title">Questionnaire Scoring
                                                            </h2>
                                                            <h4 class="sub-heading">Learn more about how this questionnaire is scored and an investor profile is determined</h4>
                                                            <hr class="section-header-border">
                                                        </div>
                                                        <div class="investment-horizon-box horizon-box-questionnaire">


                                                            <p>This questionnaire uses an approach where your investor profile is determined by the answer or score that is in the column furthest to the left in the table.

                                                            </p>
                                                        </div>
                                                        <div class="section-content section-questionnaire-scoring">
                                                            <div class="result-table-data">
                                                                <table class="investment-table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th></th>
                                                                            <th>1
                                                                                <br>Very Conservative</th>
                                                                            <th>2
                                                                                <br>Conservative</th>
                                                                            <th>3
                                                                                <br>Balanced</th>
                                                                            <th>4
                                                                                <br>Growth</th>
                                                                            <th>5
                                                                                <br>Aggressive Growth</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>Time Horizon (question 1)</td>
                                                                            <td>i</td>
                                                                            <td>ii</td>
                                                                            <td></td>
                                                                            <td>iii, iv</td>
                                                                            <td>v</td>

                                                                        </tr>
                                                                        <tr>
                                                                            <td>Investment Knowledge (question 2)</td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td>i</td>
                                                                            <td>ii</td>
                                                                            <td>iii</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Investment Objectives (question 3)</td>
                                                                            <td>i</td>
                                                                            <td>ii</td>
                                                                            <td>iii</td>
                                                                            <td></td>
                                                                            <td>iv</td>

                                                                        </tr>
                                                                        <tr>
                                                                            <td>Risk Capacity (total of questions 4-9) </td>
                                                                            <td></td>
                                                                            <td>&lt;15</td>
                                                                            <td>15-25</td>
                                                                            <td>26-40</td>

                                                                            <td>&gt;40</td>

                                                                        </tr>
                                                                        <tr>
                                                                            <td>Risk Tolerance (total of questions 10-15) </td>
                                                                            <td>&lt;20</td>
                                                                            <td>20-24</td>
                                                                            <td>25-30</td>
                                                                            <td>31-45</td>
                                                                            <td>&gt;45</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>

                                                            </div>

                                                            <div class="example-one-scoring">
                                                                <div class="scoring-text">
                                                                    <p><b>Example One:</b> Jim’s investor profile is determined by his answer or score that is in the column furthest to the left in the table. In this example, Jim expressed a willingness to
                                                                        accept risk, but has very limited risk capacity (ability to withstand losses). Jim’s Risk Capacity is what leads to a Conservative profile.</p>
                                                                </div>

                                                                <div class="result-table-data">
                                                                    <table class="investment-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th></th>
                                                                                <th>1
                                                                                    <br>Very Conservative</th>
                                                                                <th>2
                                                                                    <br>Conservative</th>
                                                                                <th>3
                                                                                    <br>Balanced</th>
                                                                                <th>4
                                                                                    <br>Growth</th>
                                                                                <th>5
                                                                                    <br>Aggressive Growth</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Time Horizon (question 1)</td>
                                                                                <td>i</td>
                                                                                <td>ii</td>
                                                                                <td></td>
                                                                                <td class="bg-active"><span>iii, iv</span></td>
                                                                                <td>v</td>

                                                                            </tr>
                                                                            <tr>
                                                                                <td>Investment Knowledge (question 2)</td>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td>i</td>
                                                                                <td class="bg-active" ><span>ii</span></td>
                                                                                <td>iii</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Investment Objectives (question 3)</td>
                                                                                <td>i</td>
                                                                                <td>ii</td>
                                                                                <td class="bg-active"><span>iii</span></td>
                                                                                <td></td>
                                                                                <td>iv</td>

                                                                            </tr>
                                                                            <tr>
                                                                                <td>Risk Capacity (total of questions 4-9) </td>
                                                                                <td></td>
                                                                                <td class="bg-active"><span>&lt;15</span></td>
                                                                                <td>15-25</td>
                                                                                <td>26-40</td>
                                                                                <td>&gt;40</td>

                                                                            </tr>
                                                                            <tr>
                                                                                <td>Risk Tolerance (total of questions 10-15) </td>
                                                                                <td><span>&lt;20</span></td>
                                                                                <td>20-24</td>
                                                                                <td>25-30</td>
                                                                                <td class="bg-active"><span>31-45</span></td>
                                                                                <td><span>&gt;45</span></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>

                                                                </div>

                                                            </div>

                                                            <div class="example-one-scoring example-two-scoring">
                                                                <div class="scoring-text">
                                                                    <p><b>Example Two:</b> In this example, Sally has significant financial resources but is unwilling to take any risk with her investments. Sally’s risk tolerance score is what leads to a Very Conservative profile.

</p>
                                                                </div>

                                                                <div class="result-table-data">
                                                                    <table class="investment-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th></th>
                                                                                <th>1
                                                                                    <br>Very Conservative</th>
                                                                                <th>2
                                                                                    <br>Conservative</th>
                                                                                <th>3
                                                                                    <br>Balanced</th>
                                                                                <th>4
                                                                                    <br>Growth</th>
                                                                                <th>5
                                                                                    <br>Aggressive Growth</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Time Horizon (question 1)</td>
                                                                                <td>i</td>
                                                                                <td class="bg-active"><span>ii</span></td>
                                                                                <td></td>
                                                                                <td>iii, iv</td>
                                                                                <td>v</td>

                                                                            </tr>
                                                                            <tr>
                                                                                <td>Investment Knowledge (question 2)</td>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td >i</td>
                                                                                <td class="bg-active"><span>ii</span></td>
                                                                                <td>iii</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Investment Objectives (question 3)</td>
                                                                                <td>i</td>
                                                                                <td>ii</td>
                                                                                <td class="bg-active"><span>iii</span></td>
                                                                                <td></td>
                                                                                <td>iv</td>

                                                                            </tr>
                                                                            <tr>
                                                                                <td>Risk Capacity (total of questions 4-9) </td>
                                                                                <td></td>
                                                                                <td>&lt;15</td>
                                                                                <td>15-25</td>
                                                                                <td>26-40</td>
                                                                                <td class="bg-active"><span>&gt;40</span> </td>

                                                                            </tr>
                                                                            <tr>
                                                                                <td>Risk Tolerance (total of questions 10-15) </td>
                                                                                <td class="bg-active"><span>&gt;20</span></td>
                                                                                <td>20-24</td>
                                                                                <td>25-30</td>
                                                                                <td>31-45</td>
                                                                                <td><span>&lt;45</span></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>


    <!-- Template created and distributed by Colorlib -->
    <?php include "footer.php"; ?>