<div class="row m-0">
    <div class="col-md-12 col-12 p-0">
        <div class="iq-content-box">
            <div class="section-header-iq">
                <h2 class="section-main-title">Investor Questionnaire</h2> 
                <hr class="section-header-border">
            </div>

            <div class="section-content">
                <div class="form_discrip_text">
                    <div class="form-discription mt-0">
                        <p>
                            When you are ready to submit your results to the MFS team, please sign in the area below, and click the submit button. Upon submission, the button will transform into a download option, and we recommend downloading a copy for your records as a precaution.</p>
                    </div>
                    <div class="input-name">
                        <input type="text" class="name" name="name" placeholder="Name" >
                    </div>
                    <div class="signature-canva-main">
                        <div style="display:none;" class="singnature-btns">
                            <input type="file" name="upload_signature" id="upload_signature" accept="image/png, image/jpeg">
                        </div>
                    </div>

                    <div class="sin-img-div draw-file-div">
                        <a class="sin-img-button" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                            <img src="" alt="" class="sin-img">
                        </a>
                        <input type="hidden" id="sign" name="sign" value="">
                    </div>
                    <div class="sig-radio">
                        <div class="draw-signature">
                            <input type="radio" name="up-draw" class="up-draw" value="draw" id="draw" checked>
                            <label for="draw">Choose a signature</label>
                        </div>
                        <div class="chose-signature">
                            <input type="radio" name="up-draw" class="up-draw" value="chose" id="upload">
                            <label for="upload">Upload a signature</label>
                        </div>
                    </div>
                </div>

                <div class="input-upload submit-to-mfs">
                    <input type="hidden" id="submit_url" value="">
                    <input type="hidden" id="submit_url_home" value="">
                    <div class="file_upload review_upload" id="review_upload_id">
                        <input type="submit" name="report_upload" value="" class="submit-mfs-button form-control form-control-file excel-file" id="" disabled onclick="submit_form();">
                        <img class="custom-upload" src="images/upload-excel-icons.webp" alt="Upload File">
                        <span class="mfstext" id="mfstextsubmit" onclick="submit_form();">Submit To MFS</span>
                    </div>
                    <span class="mfs-message"></span>
                </div>

                
            </div>

        </div>
    </div>

</div>
<div class="actions">
    <ul>
        <li><a href="javascript:void(0);" class="prev-step">Back</a>
        </li>
    </ul>
</div>