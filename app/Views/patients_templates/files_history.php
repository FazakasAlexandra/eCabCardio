<div class = "consult-files-wraper hidden">

        <form action="" class="file-upload-form">
            <!-- CHOSE FILES BUTTON -->
            <input type="file" name="files[]" multiple id="files" accept=".png, .jpg, .jpeg, .pdf">
            <!-- SAVE FILES BUTTON -->
            <button class="button-blue-dark hidden" id="save-files-button">Save Files</button>
        </form>

        <!-- DINAMICALY GENERATED CONSULT PDFS -->
        <div class="consult-pdf-container"></div>

        <div class="alert alert-success hidden" role="alert">Files successfully saved !</div>
        
        <!-- DINAMICALY GENERATED CONSULT IMGS -->
        <div class="consult-images-container"></div>
</div>