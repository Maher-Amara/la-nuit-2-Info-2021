<div class="mt-3">
    <?php if(isset($_POST) and !empty($_POST)){?>
        <pre><?php print_r($_POST) ?></pre>
    <?php } ?>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <strong>Translations</strong>
                    </div>
                    <div class="card-block">
                        <div class="d-flex justify-content-center">
                            <div class="btn-group btn-group-toggle mt-3">
                                <?php foreach($languages as $language){ ?>
                                    <a class="btn btn-outline-dark mx-2 <?= $lg==$language? 'disabled' : '' ?>" href="<?= base_url($language == $default ? "admin/translations" : "admin/translations/{$language}") ?>" draggable="false">
                                        <img class="mr-3" src="<?= base_url("img/languages/{$language}.png") ?>" alt="<?= $language ?>" draggable="false"><?= strtoupper($language) ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body card-block">
                        <form action="<?= base_url("admin/translations/language_validation/{$lg}") ?>" method="POST">
                            <?php foreach($translations as $translation){ ?>
                                <div class="form-group">
                                    <label for="<?= $translation['id'] ?>" class="form-control-label">
                                        Field Title
                                        <p><?= $translation['defLangValue'] ?></p>
                                    </label>
                                    <?php switch ($translation['type']) { case 'text': ?>
                                        <input class="form-control" id="<?= $translation['id'] ?>" name="<?= $translation['id'] ?>" type="text" value="<?= $translation['value'] ?>" maxlength="<?= $translation['maxlength'] ?>" size="10" required>
                                    <?php break; case 'textarea': ?>
                                        <textarea class="form-control" id="<?= $translation['id'] ?>" name="<?= $translation['id'] ?>" rows="2" maxlength="<?= $translation['maxlength'] ?>" required><?= $translation['value'] ?></textarea>
                                    <?php break; } ?>
                                    <?php if($translation['updated_at']){?>
                                    <div class="float-right"><small>Automatically translated using Google translation</small></div>
                                    <?php } ?>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">This feald connot be empty.</div>
                                </div>
                            <?php } ?>

                            <!-- submit button -->
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary btn-sm mr-1">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>