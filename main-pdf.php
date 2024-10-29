
<?php
    include('connection.php');

    $result_time_horizon = '';
    $result_investment_knowledge = '';
    $result_investment_objective = '';
    $result_risk_capacity_score = '';
    $result_risk_tolerance_score = '';

    $withdrawal = '';
    $investment_knowledge = '';
    $portfolio_goal = '';
    $annual_income = '';
    $income_sources = '';
    $financial_situation = '';
    $net_worth = '';
    $investment_percentage = '';
    $age_group = '';
    $investment_decision = '';
    $investment_decline = '';
    $financial_concern = '';
    $investment_choice = '';
    $investment_loss_reaction = '';
    $investment_portfolio = '';

    $signature = '';

    $id = $_GET['id']; 

    $name111 = '';
    if ($id != '') {
        $id = $id;
        $query = "SELECT * FROM `investor_questionnaire` WHERE id = $id";

        $result = mysqli_query($con, $query);
    
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $result_time_horizon            = $row['result_time_horizon'];
            $result_investment_knowledge    = $row['result_investment_knowledge'];
            $result_investment_objective    = $row['result_investment_objective'];
            $result_risk_capacity_score     = $row['result_risk_capacity_score'];
            $result_risk_tolerance_score    = $row['result_risk_tolerance_score'];

            $withdrawal                     = $row['withdrawal'];
            $investment_knowledge           = $row['investment_knowledge'];
            $portfolio_goal                 = $row['portfolio_goal'];
            $annual_income                  = $row['annual_income'];
            $income_sources                 = $row['income_sources'];
            $financial_situation            = $row['financial_situation'];
            $net_worth                      = $row['net_worth'];
            $investment_percentage          = $row['investment_percentage'];
            $age_group                      = $row['age_group'];
            $investment_decision            = $row['investment_decision'];
            $investment_decline             = $row['investment_decline'];
            $financial_concern              = $row['financial_concern'];
            $investment_choice              = $row['investment_choice'];
            $investment_loss_reaction       = $row['investment_loss_reaction'];
            $investment_portfolio           = $row['investment_portfolio'];
            
            if($row['name'] != ''){
                $name111 = $row['name'];
            }
            if($row['sign'] != ''){
                $signature = $row['sign'];
            }
            if($row['upload_sign'] != ''){
                $signature = SITE_URL .'upload/signature/'.$row['upload_sign'];
            }
        } 
        else if(mysqli_num_rows($result) === 0){
            ?> <script>window.location.href = "<?php echo SITE_URL ?>index.php" </script> <?php
        }
        else {
            ?> <script>window.location.href = "<?php echo SITE_URL ?>index.php" </script> <?php
        }
    } else {
        ?> <script>window.location.href = "<?php echo SITE_URL ?>index.php" </script> <?php
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>MFS Insurance</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="colorlib.com">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <style type="text/css">
            .headingTitle { 
                width: "70%" 
            }    
            .contentTitle { 
                width: "70%" 
            }  
            td { 
                font-size: 12px; 
            } 
            .row h5{
                margin: 10px 0;
            } 
            #sig-canvas {
                border: 2px dotted #CCCCCC;
                border-radius: 15px;
                cursor: crosshair;
                background: #fff
            }
            .text_box_lable{
                color: #9a885e;font-size: 13px;padding-right: 45px;float: left;width: 110px;
            }
            .main_hedding{
                color: #9a885e;font-size: 20px;margin-bottom: 20px;
            }
            .text_box_name{
                float: left;width: 220px;border-bottom: 1px solid;height: 20px;
            }
            .hedding_h4{
                color: #9a885e;font-size: 16px;margin-bottom: 30px;margin-top: 25px;
            }
            .div_text{
                font-size: 13px;padding-right: 45px;float: left;width: 80%;
            }
            .div_text1{
                float: left;width: 15%;border-bottom: 1px solid;
            }
            .td1{
                font-weight: bold;background: #9a8862;color: #fff; padding: 0px 5px 0px 5px;width: 40%;
            }
            .td2{
                font-weight: bold;background: #9a8862;color: #fff; padding: 0px 5px 0px 5px;width: 10%;text-align: center;
            }
            .td3{
                font-weight: bold;color: #9a885e; padding: 0px 5px 0px 5px;width: 40%;border-top: 1px solid black;
            }
            .td4{
                font-weight: bold;color: #9a885e; padding: 0px 5px 0px 5px;width: 10%;border-top: 1px solid black;text-align: center;
            }
            ul li{
                margin-bottom: 6px;
                font-size: 15px;
                line-height: 22px;
            }
            ul li.bolded {
                font-weight: bold;
            } 
            ul li span{
                color: #9a885e;
            }
        </style>
    </head>
    <body>
        <div class="container" style="background: #fff;margin: auto;margin-top: 20px;margin-bottom: 20px;padding-top: 20px;padding-bottom: 20px;">
            <img src="">
            
            <h3 class="main_hedding mt-2">What kind of Investor are you?</h3>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="all-que-ans">
                        <div class="question-row">
                            <!--1-->
                            <div class="que-col" >
                                <p style="margin: 0; font-size: 16px;">
                                    <b>Q1. When do you expect to need to withdraw a significant portion (1/3 or more) of the money in your investment portfolio? </b> 
                                </p>
                                <ul>
                                    <li class="<?= $withdrawal == 'Less	than 1 year' ? 'bolded' : 'normal' ?>">Less than 1 year <span>(1 points)</span></li>
                                    <li class="<?= $withdrawal == '1-3 years' ? 'bolded' : 'normal' ?>">1-3 years <span>(2 points)</span></li>
                                    <li class="<?= $withdrawal == '4-6 years' ? 'bolded' : 'normal' ?>">4-6 years <span>(4 points)</span></li>
                                    <li class="<?= $withdrawal == '7-9 years' ? 'bolded' : 'normal' ?>">7-9 years <span>(4 points)</span></li>
                                    <li class="<?= $withdrawal == '10 years or more' ? 'bolded' : 'normal' ?>">10 years or more <span>(5 points)</span></li>
                                </ul>
                            </div>

                            <!--2-->
                            <div class="que-col" style="margin-top: 20px; margin-bottom: 10px;" >
                                <p style="margin: 0; font-size: 16px;">
                                    <b>Q2. Which statement best describes your knowledge of investments? </b> 
                                </p>
                                <ul>
                                    <li class="<?= $investment_knowledge == 'Very Little Knowledge' ? 'bolded' : 'normal' ?>">I have very little knowledge of investments and financial markets. <span>(1 points)</span></li>
                                    <li class="<?= $investment_knowledge == 'Moderate' ? 'bolded' : 'normal' ?>">I have a moderate level of knowledge of investments and financial markets. <span>(2 points)</span></li>
                                    <li class="<?= $investment_knowledge == 'Extensive' ? 'bolded' : 'normal' ?>">I have extensive investment knowledge; understand different investment products and follow financial markets closely. <span>(3 points)</span></li>
                                </ul>
                                <img style="max-width: 320px" src="">
                            </div>

                            <!--3-->
                            <div class="que-col" style="margin-top: 20px;">
                                <p style="margin: 0; font-size: 16px;">
                                    <b>Q3. What is your primary goal for this portfolio?</b> 
                                </p>
                                <ul>
                                    <li class="<?= $portfolio_goal == 'Safety' ? 'bolded' : 'normal' ?>">I want to keep the money I have invested safe from short-term losses or readily available for short-term needs. (Safety – Investments that will satisfy this objective include GICs and money market funds). <span>(1 points)</span></li>
                                    <li class="<?= $portfolio_goal == 'Income' ? 'bolded' : 'normal' ?>">I want to generate a steady stream of income from my investments and I am less concerned about growing the value of my investments. (Income – Investments that will satisfy this objective include fixed income investments such as funds that invest in bonds). <span>(2 points)</span></li>
                                    <li class="<?= $portfolio_goal == 'Balanced' ? 'bolded' : 'normal' ?>">I want to generate some income with some opportunity for the investments to grow in value. (Balanced – A balanced fund or a portfolio that includes at least 40% in fixed income investments and no more than 60% in equity funds will satisfy this objective). <span>(3 points)</span></li>
                                    <li class="<?= $portfolio_goal == 'Growth' ? 'bolded' : 'normal' ?>">I want to generate long-term growth from my investments. (Growth – A portfolio with a relatively high proportion of funds that invest in equities will satisfy this objective if you also have a long time horizon and are willing and able to accept more risk). <span>(4 points)</span></li>
                                </ul>
                            </div>

                            <!--4-->
                            <div class="que-col" style="margin-top: 20px;">
                                <p style="margin: 0; font-size: 16px;">
                                    <b>Q4. What is your annual income (from all sources)? </b> 
                                </p>
                                <ul>
                                    <li class="<?= $annual_income == '0' ? 'bolded' : 'normal' ?>">Less than $25,000 <span>(0 points)</span></li>
                                    <li class="<?= $annual_income == '2' ? 'bolded' : 'normal' ?>">$25,000 – $49,999 <span>(2 points)</span></li>
                                    <li class="<?= $annual_income == '4' ? 'bolded' : 'normal' ?>">$50,000 – $74,999 <span>(4 points)</span></li>
                                    <li class="<?= $annual_income == '5' ? 'bolded' : 'normal' ?>">$75,000 – $99,999 <span>(5 points)</span></li>
                                    <li class="<?= $annual_income == '7' ? 'bolded' : 'normal' ?>">$100,000 – $199,999 <span>(7 points)</span></li>
                                    <li class="<?= $annual_income == '10' ? 'bolded' : 'normal' ?>">$200,000 or more <span>(10 points)</span></li>
                                </ul>
                            </div>

                            <!--5-->
                            <div class="que-col" style="margin-top: 20px;">
                                <p style="margin: 0; font-size: 16px;">
                                    <b>Q5. Your current and future income sources are:</b> 
                                </p>
                                <ul>
                                    <li class="<?= $income_sources == '8' ? 'bolded' : 'normal' ?>">Stable <span>(8 points)</span></li>
                                    <li class="<?= $income_sources == '4' ? 'bolded' : 'normal' ?>">Somewhat stable <span>(4 points)</span></li>
                                    <li class="<?= $income_sources == '1' ? 'bolded' : 'normal' ?>">Unstable <span>(1 point)</span></li>
                                </ul>
                            </div>

                            <!--6-->
                            <div class="que-col" style="margin-top: 20px;">
                                <p style="margin: 0; font-size: 16px;">
                                    <b>Q6. How would you classify your overall financial situation?</b> 
                                </p>
                                <ul>
                                    <li class="<?= $financial_situation == '0' ? 'bolded' : 'normal' ?>">No savings and significant debt <span>(0 points)</span></li>
                                    <li class="<?= $financial_situation == '2' ? 'bolded' : 'normal' ?>">Little savings and a fair amount of debt <span>(2 points)</span></li>
                                    <li class="<?= $financial_situation == '5' ? 'bolded' : 'normal' ?>">Some savings and some debt <span>(5 points)</span></li>
                                    <li class="<?= $financial_situation == '7' ? 'bolded' : 'normal' ?>">Some savings and little or no debt <span>(7 points)</span></li>
                                    <li class="<?= $financial_situation == '10' ? 'bolded' : 'normal' ?>">Significant savings and little or no debt <span>(10 points)</span></li>
                                </ul>
                            </div>

                            <!--7-->
                            <div class="que-col" style="margin-top: 20px;">
                                <p style="margin: 0; font-size: 16px;">
                                    <b>Q7. What is your estimated net worth? </b> 
                                </p>
                                <ul>
                                    <li class="<?= $net_worth == '0' ? 'bolded' : 'normal' ?>">Less than $50,000 <span>(0 points)</span></li>
                                    <li class="<?= $net_worth == '2' ? 'bolded' : 'normal' ?>">$50,000 – $99,999 <span>(2 points)</span></li>
                                    <li class="<?= $net_worth == '4' ? 'bolded' : 'normal' ?>">$100,000 – $249,999 <span>(4 points)</span></li>
                                    <li class="<?= $net_worth == '6' ? 'bolded' : 'normal' ?>">$250,000 – $499,999 <span>(6 points)</span></li>
                                    <li class="<?= $net_worth == '8' ? 'bolded' : 'normal' ?>">$500,000 - $999,999 <span>(8 points)</span></li>
                                    <li class="<?= $net_worth == '10' ? 'bolded' : 'normal' ?>">$1,000,000 or more <span>(10 points)</span></li>
                                </ul>
                            </div>

                            <!--8-->
                            <div class="que-col" style="margin-top: 20px;">
                                <p style="margin: 0; font-size: 16px;">
                                    <b>Q8. This investment account represents approximately what percentage of your total savings and investments? </b> 
                                </p>
                                <ul>
                                    <li class="<?= $investment_percentage == '10' ? 'bolded' : 'normal' ?>">Less than 25% <span>(10 points)</span></li>
                                    <li class="<?= $investment_percentage == '5' ? 'bolded' : 'normal' ?>">25% - 50% <span>(5 points)</span></li>
                                    <li class="<?= $investment_percentage == '4' ? 'bolded' : 'normal' ?>">51% - 75% <span>(4 points)</span></li>
                                    <li class="<?= $investment_percentage == '2' ? 'bolded' : 'normal' ?>">More than 75% <span>(2 points)</span></li>
                                </ul>
                            </div>

                            <!--9-->
                            <div class="que-col" style="margin-top: 20px;">
                                <p style="margin: 0; font-size: 16px;">
                                    <b>Q9. What is your age group?</b> 
                                </p>
                                <ul>
                                    <li class="<?= $age_group == '20' ? 'bolded' : 'normal' ?>">Under 35 <span>(20 points)</span></li>
                                    <li class="<?= $age_group == '8' ? 'bolded' : 'normal' ?>">35-54 <span>(8 points)</span></li>
                                    <li class="<?= $age_group == '3' ? 'bolded' : 'normal' ?>">55-64 <span>(3 points)</span></li>
                                    <li class="<?= $age_group == '1' ? 'bolded' : 'normal' ?>">65 or older <span>(1 point)</span></li>
                                </ul>
                            </div>

                            <!--10-->
                            <div class="que-col" style="margin-top: 20px;">
                                <p style="margin: 0; font-size: 16px;">
                                    <b>Q10. In making financial and investment decisions you are:</b> 
                                </p>
                                <ul>
                                    <li class="<?= $investment_decision == '0' ? 'bolded' : 'normal' ?>">Very conservative and try to minimize risk and avoid the possibility of any loss <span>(0 points)</span></li>
                                    <li class="<?= $investment_decision == '4' ? 'bolded' : 'normal' ?>">Conservative but willing to accept a small amount of risk <span>(4 points)</span></li>
                                    <li class="<?= $investment_decision == '6' ? 'bolded' : 'normal' ?>">Willing to accept a moderate level of risk and tolerate losses to achieve potentially higher returns <span>(6 points)</span></li>
                                    <li class="<?= $investment_decision == '10' ? 'bolded' : 'normal' ?>">Aggressive and typically take on significant risk and are willing to tolerate large losses for the potential of achieving higher returns <span>(10 points)</span></li>
                                </ul>
                            </div>

                            <!--11-->
                            <div class="que-col" style="margin-top: 20px;">
                                <p style="margin: 0; font-size: 16px;">
                                    <b>Q11. The value of an investment portfolio will generally go up and down over time. Assuming that you have invested $10,000, how much of a decline in your investment portfolio could you tolerate in a 12-month period?</b> 
                                </p>
                                <ul>
                                    <li class="<?= $investment_decline == '0' ? 'bolded' : 'normal' ?>">I could not tolerate any loss <span>(0 points)</span></li>
                                    <li class="<?= $investment_decline == '3' ? 'bolded' : 'normal' ?>">-$300 (-3%) <span>(3 points)</span></li>
                                    <li class="<?= $investment_decline == '6' ? 'bolded' : 'normal' ?>">-$1,000 (-10%) <span>(6 points)</span></li>
                                    <li class="<?= $investment_decline == '8' ? 'bolded' : 'normal' ?>">-$2,000 (-20%) <span>(8 points)</span></li>
                                    <li class="<?= $investment_decline == '10' ? 'bolded' : 'normal' ?>">More than -$2,000 (more than -20%) <span>(10 points)</span></li>
                                </ul>
                            </div>

                            <!--12-->
                            <div class="que-col" style="margin-top: 20px;">
                                <p style="margin: 0; font-size: 16px;">
                                    <b>Q12. When you are faced with a major financial decision, are you more concerned about the possible losses or the possible gains?</b> 
                                </p>
                                <ul>
                                    <li class="<?= $financial_concern == '0' ? 'bolded' : 'normal' ?>">Always the possible losses <span>(0 points)</span></li>
                                    <li class="<?= $financial_concern == '3' ? 'bolded' : 'normal' ?>">Usually the possible losses <span>(3 points)</span></li>
                                    <li class="<?= $financial_concern == '6' ? 'bolded' : 'normal' ?>">Usually the possible gains <span>(6 points)</span></li>
                                    <li class="<?= $financial_concern == '10' ? 'bolded' : 'normal' ?>">Always the possible gains <span>(10 points)</span></li>
                                </ul>
                            </div>

                            <!--13-->
                            <div class="que-col" style="margin-top: 20px; margin-bottom: 10px;">
                                <p style="margin: 0; font-size: 16px;">
                                    <b>Q13. The chart below shows the greatest one-year loss and the highest one-year gain on four different investments of $10,000. Given the potential gain or loss in any one year, which investment would you likely invest your money in:</b> 
                                </p>
                                <ul>
                                    <li class="<?= $investment_choice == '0' ? 'bolded' : 'normal' ?>">EITHER a loss of $0 OR a gain of $200 <span>(0 points)</span></li>
                                    <li class="<?= $investment_choice == '3' ? 'bolded' : 'normal' ?>">EITHER a loss of $200 OR a gain of $500 <span>(3 points)</span></li>
                                    <li class="<?= $investment_choice == '6' ? 'bolded' : 'normal' ?>">EITHER a loss of $800 OR a gain of $1,200 <span>(6 points)</span></li>
                                    <li class="<?= $investment_choice == '10' ? 'bolded' : 'normal' ?>">EITHER a loss of $2,000 OR a gain of $2,500 <span>(10 points)</span></li>
                                </ul>
                                <img style="max-width: 320px" src="">
                            </div>

                            <!--14-->
                            <div class="que-col" style="margin-top: 20px;">
                                <p style="margin: 0; font-size: 16px;">
                                    <b>Q14. From September 2008 through November 2008, North American stock markets lost over 30%. If you currently owned an investment that lost over 30% in 3 months, you would:</b> 
                                </p>
                                <ul>
                                    <li class="<?= $investment_loss_reaction == '0' ? 'bolded' : 'normal' ?>">Sell all of the remaining investment to avoid further losses <span>(0 points)</span></li>
                                    <li class="<?= $investment_loss_reaction == '3' ? 'bolded' : 'normal' ?>">Sell a portion of the remaining investment to protect some of your capital <span>(3 points)</span></li>
                                    <li class="<?= $investment_loss_reaction == '5' ? 'bolded' : 'normal' ?>">Hold onto the investment and not sell any of the investment in the hopes of higher future returns <span>(5 points)</span></li>
                                    <li class="<?= $investment_loss_reaction == '10' ? 'bolded' : 'normal' ?>">Buy more of the investment now that prices are lower <span>(10 points)</span></li>
                                </ul>
                            </div>

                            <!--15-->
                            <div class="que-col" style="margin-top: 20px; margin-bottom: 10px;">
                                <p style="margin: 0; font-size: 16px;">
                                    <b>Q15. Investments with higher returns typically involve greater risk. The charts below show hypothetical annual returns (annual gains and losses) for four different investment portfolios over a 10-year period. Keeping in mind how the returns fluctuate, which investment portfolio would you be most comfortable holding?</b> 
                                </p>
                                <ul>
                                    <li class="<?= $investment_portfolio == '0' ? 'bolded' : 'normal' ?>">Portfolio A <span>(0 points)</span></li>
                                    <li class="<?= $investment_portfolio == '4' ? 'bolded' : 'normal' ?>">Portfolio B <span>(4 points)</span></li>
                                    <li class="<?= $investment_portfolio == '6' ? 'bolded' : 'normal' ?>">Portfolio C <span>(6 points)</span></li>
                                    <li class="<?= $investment_portfolio == '10' ? 'bolded' : 'normal' ?>">Portfolio D <span>(10 points)</span></li>
                                </ul>
                                <img style="max-width: 320px;" src="" >
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            
            
            <h3 class="main_hedding mt-2">Your Answers:</h3>
            <div class="row">
                <div class="col-md-12">
                    <table style="width:100%; margin-bottom:15px; border-collapse: collapse;">
                        <tr>
                            <td style="width:70%; padding:10px; border: 1px solid #000;"><h5 style="margin:0; font-size:16px;">Time Horizon:</h5></td>
                            <td style="width:30%; text-align:left; border: 1px solid #000;"><h5 style="margin:0; width:200px; display:inline-block; font-size:14px; padding:10px; font-weight:400;"><?php echo $result_time_horizon; ?></h5></td>
                        </tr>
                        <tr>
                            <td style="width:70%; padding:10px; border: 1px solid #000;"><h5 style="margin:0; font-size:16px;">Investment Knowledge:</h5></td>
                            <td style="width:30%; text-align:left; border: 1px solid #000;"><h5 style="margin:0; width:200px; display:inline-block; font-size:14px; font-weight:400; padding:10px;"><?php echo $result_investment_knowledge; ?></h5></td>
                        </tr>
                        <tr>
                            <td style="width:70%; padding:10px; border: 1px solid #000;"><h5 style="margin:0; font-size:16px;">Investment Objectives:</h5></td>
                            <td style="width:30%; text-align:left; border: 1px solid #000;"><h5 style="margin:0; width:200px; display:inline-block; font-size:14px; font-weight:400; padding:10px;"><?php echo $result_investment_objective; ?></h5></td>
                        </tr>
                        <tr>
                            <td style="width:70%; padding:10px; border: 1px solid #000;"><h5 style="margin:0; font-size:16px;">Your Risk Capacity Score is:</h5></td>
                            <td style="width:30%; text-align:left; border: 1px solid #000;"><h5 style="margin:0; width:200px; display:inline-block; font-size:14px; font-weight:400; padding:10px;"><?php echo $result_risk_capacity_score; ?></h5></td>
                        </tr>
                        <tr>
                            <td style="width:70%;padding:10px; border: 1px solid #000;"><h5 style="margin:0; font-size:16px;">Your Risk Tolerance Score is:</h5></td>
                            <td style="width:30%; text-align:left; border: 1px solid #000;"><h5 style="margin:0; width:200px; display:inline-block; font-size:14px; font-weight:400; padding:10px;"><?php echo $result_risk_tolerance_score; ?></h5></td>
                        </tr>
                    </table>
                </div>
                <hr class="" style="margin-top:30px;">
                <div class="col-md-12" style=""> 
                    <?php if($name111){ ?>
                    <div class="agile-field-txt" style="display: table; float: left; width: 100%;">
                        <div style="display: table-cell; vertical-align: middle;"><label>Name: <?php echo $name111; ?></label></div>      
                    </div>
					<br>
                    <?php }if($signature){ ?>
                    <div class="agile-field-txt" style="display: table;">
                        <div style="display: table-cell; vertical-align: middle;"><label>Signature: </label></div>    
                        <div style="display: table-cell; vertical-align: middle;">
                            <img id="sig-image" src="<?php echo $signature; ?>" alt="Signature" style="max-width:250px !important; height:50px; object-fit:contain;" />
                        </div>    
                    </div>
                    <?php } ?>
                </div>
            </div>    
        </div>
    </body>
</html>