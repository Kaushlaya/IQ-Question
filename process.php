<?php

use Dompdf\Dompdf;
require("vendor/phpmailer/phpmailer/src/PHPMailer.php");
require("vendor/phpmailer/phpmailer/src/SMTP.php");
require("vendor/phpmailer/phpmailer/src/Exception.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

include('connection.php');

session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST' || $_POST){

    $upload_signature = NULL;
    
    if (isset($_FILES['upload_signature']['tmp_name']) && $_FILES['upload_signature']['tmp_name'] != '') {
        $tmp_name = $_FILES['upload_signature']['tmp_name'];
        $name = $_FILES['upload_signature']['name'];
        $type = $_FILES['upload_signature']['type'];
        $size = $_FILES['upload_signature']['size'];
        
        $upload_dir = SIGNATURE_PATH;
        
        $allowed_types = ['image/png', 'image/jpeg'];
        if (!in_array($type, $allowed_types)) {
            echo "Invalid file type. Please upload a PNG or JPEG image.";
            exit;
        }
        $unique_name = uniqid('signature_') . '.' . pathinfo($name, PATHINFO_EXTENSION);
        if (move_uploaded_file($tmp_name, $upload_dir . '/' . $unique_name)) {
            $upload_signature = $unique_name;
        } else {
            $upload_signature = NULL;
        }
    } else {
        $upload_signature = NULL;
    }
    
    if(isset($_SESSION['id']) && isset($_POST['update'])){
        $id = $_SESSION['id'];
        $upload_signature               = $upload_signature; 
        $sign                           = isset($_POST["sign"]) && $_POST["sign"] != '' ? $_POST["sign"] : NULL;
        $name                           = isset($_POST["name"]) && $_POST["name"] != '' ? $_POST["name"] : NULL;
        if($upload_signature){
            $sql = "UPDATE `investor_questionnaire` SET `upload_sign` = '$upload_signature', `name` = '$name' where id=$id";
        }else{
            $sql = "UPDATE `investor_questionnaire` SET `sign` = '$sign', `name` = '$name' where id=$id";
        }
        // echo $sql; die;
        if (mysqli_query($con, $sql)) {
            session_unset();
            session_destroy();
        }
        header("Location: " . SITE_URL . "index.php");

    }
    

    $terms                          = isset($_POST["terms"]) && $_POST["terms"] == 'on' ? 1 : 0;
    $withdrawal                     = isset($_POST["withdrawal"]) && $_POST["withdrawal"] != '' ? $_POST["withdrawal"] : 'NA';
    $investment_knowledge           = isset($_POST["investment_knowledge"]) && $_POST["investment_knowledge"] != '' ? $_POST["investment_knowledge"] : 'NA';
    $portfolio_goal                 = isset($_POST["portfolio_goal"]) && $_POST["portfolio_goal"] != '' ? $_POST["portfolio_goal"] : 'NA';
    $annual_income                  = isset($_POST["annual_income"]) && $_POST["annual_income"] != '' ? $_POST["annual_income"] : 'NA';
    $income_sources                 = isset($_POST["income_sources"]) && $_POST["income_sources"] != '' ? $_POST["income_sources"] : 'NA';
    $financial_situation            = isset($_POST["financial_situation"]) && $_POST["financial_situation"] != '' ? $_POST["financial_situation"] : 'NA';
    $net_worth                      = isset($_POST["net_worth"]) && $_POST["net_worth"] != '' ? $_POST["net_worth"] : 'NA';
    $investment_percentage          = isset($_POST["investment_percentage"]) && $_POST["investment_percentage"] != '' ? $_POST["investment_percentage"] : 'NA';
    $age_group                      = isset($_POST["age_group"]) && $_POST["age_group"] != '' ? $_POST["age_group"] : 'NA';
    $investment_decision            = isset($_POST["investment_decision"]) && $_POST["investment_decision"] != '' ? $_POST["investment_decision"] : 'NA';
    $investment_decline             = isset($_POST["investment_decline"]) && $_POST["investment_decline"] != '' ? $_POST["investment_decline"] : 'NA';
    $financial_concern              = isset($_POST["financial_concern"]) && $_POST["financial_concern"] != '' ? $_POST["financial_concern"] : 'NA';
    $investment_choice              = isset($_POST["investment_choice"]) && $_POST["investment_choice"] != '' ? $_POST["investment_choice"] : 'NA';
    $investment_loss_reaction       = isset($_POST["investment_loss_reaction"]) && $_POST["investment_loss_reaction"] != '' ? $_POST["investment_loss_reaction"] : 'NA';
    $investment_portfolio           = isset($_POST["investment_portfolio"]) && $_POST["investment_portfolio"] != '' ? $_POST["investment_portfolio"] : 'NA';
    $upload_signature               = $upload_signature; 
    $sign                           = isset($_POST["sign"]) && $_POST["sign"] != '' ? $_POST["sign"] : NULL;
    $name                           = isset($_POST["name"]) && $_POST["name"] != '' ? $_POST["name"] : NULL;

    // ================== make the calculation ==================
    $result_time_horizon            = $withdrawal;
    $result_investment_knowledge    = $investment_knowledge;
    $result_investment_objective    = $portfolio_goal;
    $result_risk_capacity_score     = $annual_income + $income_sources + $financial_situation + $net_worth + $investment_percentage + $age_group;
    $result_risk_tolerance_score    = $investment_decision + $investment_decline + $financial_concern + $investment_choice + $investment_loss_reaction + $investment_portfolio;

    if(isset($_POST['get_results'])){
        echo json_encode(['result_time_horizon' => $result_time_horizon, 'result_investment_knowledge' => $result_investment_knowledge, 'result_investment_objective' => $result_investment_objective, 'result_risk_capacity_score' => $result_risk_capacity_score, 'result_risk_tolerance_score' => $result_risk_tolerance_score]);
        die;
    }

    // ================== save the data into the database ==================
    $sql = "INSERT INTO investor_questionnaire (name, terms, withdrawal, investment_knowledge, portfolio_goal, annual_income, income_sources, financial_situation, net_worth, investment_percentage, age_group, investment_decision, investment_decline, financial_concern, investment_choice, investment_loss_reaction, investment_portfolio, sign, upload_sign, result_time_horizon, result_investment_knowledge, result_investment_objective, result_risk_capacity_score, result_risk_tolerance_score) VALUES ('$name', '$terms', '$withdrawal', '$investment_knowledge', '$portfolio_goal', '$annual_income', '$income_sources', '$financial_situation', '$net_worth', '$investment_percentage', '$age_group', '$investment_decision', '$investment_decline', '$financial_concern', '$investment_choice', '$investment_loss_reaction', '$investment_portfolio', '$sign', '$upload_signature', '$result_time_horizon', '$result_investment_knowledge', '$result_investment_objective', '$result_risk_capacity_score', '$result_risk_tolerance_score')";
    
    if (mysqli_query($con, $sql)) {
        
        $inserted_id = mysqli_insert_id($con);

        $_SESSION['id'] = $inserted_id;
        // ================== generate the PDF ==================
        $dompdf = new Dompdf();
        $url = SITE_URL . 'main-pdf.php?id=' . $inserted_id;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $contents = curl_exec($ch);
        if (curl_errno($ch)) {
            echo curl_error($ch);
            echo "\n<br />";
            $contents = '';
        } else {
            curl_close($ch);
        }

        if (!is_string($contents) || !strlen($contents)) {
            echo "Failed to get contents.";
            $contents = '';
        }

        try {
            //code...
            $dompdf->loadHtml($contents);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
        } catch (\Throwable $th) {
            echo $th->getMessage();
            //throw $th;
        }

        $pdf_output = $dompdf->output();
        $pdf_filename = PDF_PATH . "/Investor_Results_$inserted_id.pdf";
        file_put_contents($pdf_filename, $pdf_output);

        // ================== send the email notification to admin with the PDF attached ==================
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = SMTP_HOST;
            $mail->SMTPAuth = true;
            $mail->Username = SMTP_USERNAME;
            $mail->Password = SMTP_PASSWORD;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = SMTP_PORT;

            //Recipients
            $mail->setFrom(SMTP_FROM_EMAIL, SMTP_FROM_EMAIL_NAME);
            $mail->addAddress(ADMIN_EMAIL);

            // Attachments
            $mail->addAttachment($pdf_filename);

            // Content
            $mail->isHTML(true);
            $mail->Subject = EMAIL_SUBJECT;
            $mail->Body    = EMAIL_BODY;

            $mail->send();
        } catch (Exception $e) {
            // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            
        }

        // ================== redirect to the resultant page ==================
        echo json_encode(['url' => SITE_URL.'force-download.php?id='.$inserted_id, 'success'=>true]);
        // header("Location: " . SITE_URL . "result.php?id=" . $inserted_id);
        exit();


    } else {
        echo "Error inserting data: " . mysqli_error($con);
    }

}else{
    header("Location: " . SITE_URL . "index.php");
}

?>