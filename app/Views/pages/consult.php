<div id="consult-page">
    <form action="/ecabcardio/public/patients/<?php echo $data['patient']->id ?>/consult" method="POST" class="consult-form" enctype="multipart/form-data">

        <?php echo view('/consult_templates/header.php'); ?>
        <?php echo view('/consult_templates/alerts.php'); ?>

        <div class="outer-wraper">
            <div class="wraper">
                <?php echo view('/consult_templates/selections.php'); ?>
                <div class="wraper">
                    <div class="inner-wraper">
                        <label for="personal_physiological_antecedents">personal physiological antecedents</label>
                        <input class="form-control" type="text" name="personal_physiological_antecedents" value="<?php echo set_value('personal_physiological_antecedents'); ?>">
                    </div>
                    <div class="inner-wraper">
                        <label for="personal_patological_antecedents">persoanl patological antecedents</label>
                        <input class="form-control" type="text" name="personal_patological_antecedents" value="<?php echo set_value('personal_patological_antecedents'); ?>">
                    </div>
                </div>
            </div>

            <div class="wraper">
                <div class="inner-wraper">
                    <label for="hetero_colateral_antecedents">hetero colateral antecedents </label>
                    <input class="form-control" type="text" name="hetero_colateral_antecedents" value="<?php echo set_value('hetero_colateral_antecedents'); ?>">
                </div>
                <div class="inner-wraper">
                    <label for="environmental_conditions">environmental conditions </label>
                    <input class="form-control"type="text" name="environmental_conditions" value="<?php echo set_value('environmental_conditions'); ?>">
                </div>
                <div class="inner-wraper">
                    <label for="current_state">current state</label>
                    <input class="form-control" type="text" name="current_state" value="<?php echo set_value('current_state'); ?>">
                </div>
            </div>

            <div class="wraper">
                <div class="inner-wraper">
                    <label for="circulatory_system">circulatory system</label>
                    <input class="form-control" type="text" name="circulatory_system" value="<?php echo set_value('circulatory_system'); ?>">
                </div>
                <div class="inner-wraper">
                    <label for="local_and_complementary_examinations">local and complementary examinations</label>
                    <input class="form-control" type="text" name="local_and_complementary_examinations" value="<?php echo set_value('local_and_complementary_examinations'); ?>">
                </div>
                <div class="inner-wraper">
                    <label for="consult_reason">consult reason</label>
                    <input class="form-control" type="text" name="consult_reason" value="<?php echo set_value('consult_reason'); ?>">
                </div>
            </div>

            <div class="wraper">
                <div class="inner-wraper">
                    <label for="observations">observations</label>
                    <input class="form-control" type="text" name="observations" value="<?php echo set_value('observations'); ?>">
                </div>
                <div class="inner-wraper">
                    <label for="diagnostic">diagnostic</label>
                    <input class="form-control" type="text" name="diagnostic" value="<?php echo set_value('diagnostic'); ?>">
                </div>
                <div class="inner-wraper">
                    <label for="treatment">treatment</label>
                    <input class="form-control" type="text" name="treatment" value="<?php echo set_value('treatment'); ?>">
                </div>
            </div>

            <div class="wraper">
                <div class="inner-wraper">
                    <label for="recommendations">recommendations</label>
                    <input class="form-control" type="text" name="recommendations" value="<?php echo set_value('recommendations'); ?>">
                </div>
                <div class="inner-wraper">
                <label for="hour">Hour</label>
                    <input class="form-control" type="text" name="hour" value="<?php echo set_value('hour'); ?>">
                </div>
            </div>
        </div>
        <?php echo view('/consult_templates/footer.php'); ?>
    </form>

    <?php echo view('/consult_templates/patient_fields.php'); ?>
</div>

<?php echo view('/templates/medical_letter.php'); ?>

<script type="module" src="/ecabcardio/public/javascript/consult.js"></script>

<?php echo view('/templates/footer.php'); ?>