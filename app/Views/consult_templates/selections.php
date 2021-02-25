<div class="inner-wraper">
    <label for="examinations">Examinations</label>
    <select name="examinations[]" multiple class="form-control">
        <?php foreach ($data['examinations'] as $examination) : ?>
            <option value=<?php echo $examination['id'] ?>>
                <?php echo $examination['examination'] ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

<div class="inner-wraper">
    <label for="analysis">Analysis</label>

    <select name="analysis[]" multiple class="form-control">
        <?php foreach ($data['analysis'] as $analysis) : ?>
            <option value=<?php echo $analysis['id'] ?>>
                <?php echo $analysis['analysis'] ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>