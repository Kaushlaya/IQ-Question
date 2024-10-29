<?php include "header.php"; ?>

<main class="iq_main_sect">
    <div class="site-content-iq" style="background: url('<?php echo SITE_URL; ?>images/iq-main-bg.webp');">
        <div class="page-wrapper-iq">
            <div class="iq-main-block">
                <div class="iq_main">
                    <div class="main-page-iq">
                        <div class="row m-0">
                            <div class="col-12 p-0 text-center">
                                <a href="<?php echo SITE_URL?>" class="header-link-sec">
                                    <div class="section-logo-header">
                                        <div class="logo-image">
                                            <img class="logo_mains" src="<?php echo SITE_URL ?>images/mfs-logo.webp" alt="Logo">
                                        </div>
                                        <p class="logo_subtitles">Your gold standard for service and planning excellence.</p>
                                    </div>
                                </a>

                                <div class="iq-multistep-wizard">
                                    <form action="javascript:void(0);" method="post" class="signatureformiq" id="wizardiq" enctype='multipart/form-data'>
                                        <!-- SECTION 1 -->
                                        <section class="steps_div">
                                            <?php include ROOT_PATH_STEPS_PAGE . '/step_1.php'; ?>
                                        </section>

                                        <!-- SECTION 2 -->
                                        <section class="steps_div">
                                            <?php include ROOT_PATH_STEPS_PAGE . '/step_2.php'; ?>   
                                        </section>

                                        <!-- SECTION 3 -->
                                        <section class="steps_div">
                                            <?php include ROOT_PATH_STEPS_PAGE . '/step_3.php'; ?>   
                                        </section>

                                        <!-- SECTION 4 -->
                                        <section class="steps_div">
                                            <?php include ROOT_PATH_STEPS_PAGE . '/step_4.php'; ?>   
                                        </section>

                                        <!-- SECTION 5 -->
                                        <section class="steps_div">
                                            <?php include ROOT_PATH_STEPS_PAGE . '/step_5.php'; ?>   
                                        </section>

                                        <!-- SECTION 6 -->
                                        <section class="steps_div">
                                            <?php include ROOT_PATH_STEPS_PAGE . '/step_6.php'; ?>  
                                        </section>

                                        <!-- SECTION 7 -->
                                        <section class="steps_div">
                                            <?php include ROOT_PATH_STEPS_PAGE . '/step_7.php'; ?>  
                                        </section>

                                        <!-- SECTION 8 -->
                                        <section class="steps_div">
                                            <?php include ROOT_PATH_STEPS_PAGE . '/step_8.php'; ?>  
                                        </section>

                                        <!-- SECTION 9 -->
                                        <section class="steps_div">
                                            <?php include ROOT_PATH_STEPS_PAGE . '/step_9.php'; ?>  
                                        </section>

                                        <!-- SECTION 10 -->
                                        <section class="steps_div">
                                            <?php include ROOT_PATH_STEPS_PAGE . '/step_10.php'; ?>  
                                        </section>

                                        <!-- SECTION 11 -->
                                        <section class="steps_div">
                                            <?php include ROOT_PATH_STEPS_PAGE . '/step_11.php'; ?>  
                                        </section>

                                        <!-- SECTION 12 -->
                                        <section class="steps_div">
                                            <?php include ROOT_PATH_STEPS_PAGE . '/step_12.php'; ?>  
                                        </section>

                                        <!-- SECTION 13 -->
                                        <section class="steps_div">
                                            <?php include ROOT_PATH_STEPS_PAGE . '/step_13.php'; ?>  
                                        </section>

                                        <!-- SECTION 14 -->
                                        <section class="steps_div">
                                            <?php include ROOT_PATH_STEPS_PAGE . '/step_14.php'; ?>  
                                        </section>

                                        <!-- SECTION 15 -->
                                        <section class="steps_div">
                                            <?php include ROOT_PATH_STEPS_PAGE . '/step_15.php'; ?>  
                                        </section>

                                        <!-- SECTION 16 -->
                                        <section class="steps_div">
                                            <?php include ROOT_PATH_STEPS_PAGE . '/step_16.php'; ?>  
                                        </section>

                                        <!-- Result -->
                                        <section class="steps_div">
                                            <?php include 'result.php'; ?>  
                                        </section>

                                        <!-- SECTION 17 -->
                                        <section class="steps_div">
                                            <?php include ROOT_PATH_STEPS_PAGE . '/step_17.php'; ?>  
                                        </section>

                                        <section class="steps_div">
                                            <?php include ROOT_PATH_STEPS_PAGE . '/thankyou.php'; ?>  
                                        </section>
                                    
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<!--- signtaure modal --->




<!-- Template created and distributed by Colorlib -->
<?php include "footer.php"; ?>