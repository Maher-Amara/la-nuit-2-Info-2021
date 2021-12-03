<style type="text/css">
    .ck-editor p {
        color: #333;
    }
    .ck-editor__editable_inline {
        min-height: 200px;
    }
</style>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="card">
            <div class="card-header"><strong class="card-title">New project / project title (saved) / project title (update) </strong></div>
            <div class="card-body">
                <div id="pay-invoice">
                    <div class="card-body">
                        <form method="post" enctype='multipart/form-data'>
                            <ul class="nav nav-tabs list-inline pb-3" role="tablist">
                                <li class="list-inline-item active" role="presentation">
                                    <a href="#fr" aria-controls="home" role="tab" data-toggle="tab" class="btn btn-outline-dark active" draggable="false">
                                        <img class="mr-3" src="<?= base_url("img/languages/fr.png") ?>" alt="fr" draggable="false"><?= strtoupper('fr') ?>
                                    </a>
                                </li>
                                <li class="list-inline-item" role="presentation">
                                    <a href="#en" aria-controls="home" role="tab" data-toggle="tab" class="btn btn-outline-dark" draggable="false">
                                        <img class="mr-3" src="<?= base_url("img/languages/en.png") ?>" alt="en" draggable="false"><?= strtoupper('en') ?>
                                    </a>
                                </li>
                                <li class="list-inline-item" role="presentation">
                                    <a href="#nl" aria-controls="home" role="tab" data-toggle="tab" class="btn btn-outline-dark" draggable="false">
                                        <img class="mr-3" src="<?= base_url("img/languages/nl.png") ?>" alt="nl" draggable="false"><?= strtoupper('nl') ?>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content my-2">
                                <div role="tabpanel" class="tab-pane active" id="fr">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="titleFr" class="control-label mb-1">Title</label>
                                                <input id="titleFr" name="titleFr" type="text" class="form-control<?= $validation->getError('titleFr') ? ' is-invalid' : '' ?>" value="<?= set_value('titleFr') ?>" placeholder="Title" onkeyup="setTitleHelperText(this.value)">
                                                <div class="invalid-feedback"><?= $validation->getError('titleFr')?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="categorieId" class="control-label mb-1">Categorie</label>
                                                <select id="categorieId" class="custom-select<?= $validation->getError('categorieId') ? ' is-invalid' : '' ?>" name="categorieId">
                                                    <option></option>
                                                    <?php foreach($categories as $categories) { ?> 
                                                        <option value="<?= $categories['nameId'] ?>" <?= set_select('categorieId', $categories['nameId']) ?>><?= $categories['title'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="invalid-feedback"><?= $validation->getError('categorieId')?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="descriptionFr" class="control-label mb-1">Description</label>
                                        <textarea id="descriptionFr" name="descriptionFr" class="form-control<?= $validation->getError('descriptionFr') ? ' is-invalid' : '' ?>" placeholder="Description" onkeyup="setDescriptionHelperText(this.value)"><?= set_value('descriptionFr') ?></textarea>
                                        <div class="invalid-feedback"><?= $validation->getError('descriptionFr') ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="thumbnail">
                                            <div>Choose a Thumbnail (Recommended: 1024px x 672px)</div>
                                            <img class="<?= $validation->getError('thumbnail')? 'border border-danger':'' ?>" id="thumbnailPreview" src="<?= base_url('admin-dashboard/images/thumbnailPlaceHolder.png') ?>" style="width:100%;"/>
                                        </label>
                                        <input accept="image/*" type="file" class="custom-file-input form-control<?= $validation->getError('thumbnail')? ' is-invalid':'' ?>" name="thumbnail" id="thumbnail"  style="display:none;">
                                        <div class="invalid-feedback"><?= $validation->getError('thumbnail') ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="contentFr" class="control-label mb-1">Content</label>
                                        <textarea id="contentFr" class="contentFr form-control<?= $validation->getError('contentFr') ? ' is-invalid' : '' ?>" name="contentFr"><?= set_value('contentFr', '', False) ?></textarea>
                                        <div class="invalid-feedback"><?= $validation->getError('contentFr') ?></div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="en">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group text-alighn-center">
                                                <label for="titleEn" class="control-label mb-1">Title ( EN )</label>
                                                <p class="titleHelperText"></p>
                                                <input id="titleEn" name="titleEn" type="text" class="form-control<?= $validation->getError('titleEn') ? ' is-invalid' : '' ?>" value="<?= set_value('titleEn') ?>" placeholder="Title">
                                                <div class="invalid-feedback"><?= $validation->getError('titleEn') ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="descriptionEn" class="control-label mb-1">Description ( EN )</label>
                                        <p class="descriptionHelperText"></p>
                                        <textarea id="descriptionEn" name="descriptionEn" class="form-control<?= $validation->getError('descriptionEn') ? ' is-invalid' : '' ?>" placeholder="Description"><?= set_value('titleEn') ?><?= set_value('descriptionEn') ?></textarea>
                                        <div class="invalid-feedback"><?= $validation->getError('descriptionEn') ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="contentEn" class="control-label mb-1">Content ( EN )</label>
                                        <textarea id="contentEn" class="contentEn form-control<?= $validation->getError('contentEn') ? ' is-invalid' : '' ?>" name="contentEn"><?= set_value('contentEn', '', False) ?></textarea>
                                        <div class="invalid-feedback"><?= $validation->getError('contentEn') ?></div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="nl">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="titleNl" class="control-label mb-1">Title ( NL )</label>
                                                <p class="titleHelperText"></p>
                                                <input id="titleNl" name="titleNl" type="text" class="form-control<?= $validation->getError('titleNl') ? ' is-invalid' : '' ?>" value="<?= set_value('titleNl') ?>" placeholder="Title">
                                                <div class="invalid-feedback"><?= $validation->getError('titleNl') ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="descriptionNl" class="control-label mb-1">Description ( NL )</label>
                                        <p class="descriptionHelperText"></p>
                                        <textarea id="descriptionNl" name="descriptionNl" class="form-control<?= $validation->getError('descriptionNl') ? ' is-invalid' : '' ?>" placeholder="Description"><?= set_value('descriptionNl') ?></textarea>
                                        <div class="invalid-feedback"><?= $validation->getError('descriptionNl') ?></div>
                                    
                                    </div>
                                    <div class="form-group">
                                        <label for="contentNl" class="control-label mb-1">Content ( NL )</label>
                                        <textarea id="contentNl" class="contentNl form-control<?= $validation->getError('contentNl') ? ' is-invalid' : '' ?>" name="contentNl"><?= set_value('contentNl', '', False) ?></textarea>
                                        <div class="invalid-feedback"><?= $validation->getError('contentNl') ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" formaction="<?= base_url('admin/projects/save-draft') ?>" class="btn btn-lg btn-secondary btn-block m-1">
                                        <i class="fa fa-save fa-lg"></i>&nbsp;Save
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" formaction="<?= base_url('admin/projects/publish') ?>" class="btn btn-lg btn-info btn-block m-1">
                                        <i class="fa fa-send fa-lg"></i>&nbsp;Publish
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- .card -->
    </div>
</div>

<script src="<?= base_url('admin-dashboard/CKEditor/ckeditor.js')?>"></script>
<script>
    
    const TitleEt = document.getElementById('titleFr');
    const DescriptionEt = document.getElementById('descriptionFr');
    setTitleHelperText(TitleEt.value);
    setDescriptionHelperText(DescriptionEt.value);

    function setTitleHelperText(value){
        titleHelperTextEts = document.getElementsByClassName("titleHelperText");
        titleHelperTextEts[0].innerHTML = value;
        titleHelperTextEts[1].innerHTML = value;
    }

    function setDescriptionHelperText(value){
        descriptionHelperTextEts = document.getElementsByClassName("descriptionHelperText");
        descriptionHelperTextEts[0].innerHTML = value;
        descriptionHelperTextEts[1].innerHTML = value;
    }

    // input image previewer
    setTumbnailpreviewer()

    const ThumbnailEt = document.getElementById('thumbnail');
    ThumbnailEt.addEventListener('change', (event) => {
        setTumbnailpreviewer()
    });

    function setTumbnailpreviewer(){
        const [file] = thumbnail.files
        if (file) {
            thumbnailPreview.src = URL.createObjectURL(file)
        }
    }

    const contents = ['#contentFr', '#contentEn', '#contentNl']
    contents.forEach(function(contentId){
        ClassicEditor.create( document.querySelector( contentId ), {
            simpleUpload: {
                // The URL that the images are uploaded to.
                uploadUrl: '<?= base_url('admin/projects/upload_image') ?>',
                // Enable the XMLHttpRequest.withCredentials property.
                withCredentials: true,
                // Headers sent along with the XMLHttpRequest to the upload server.
                headers: {
                    'X-CSRF-TOKEN': 'CSRF-Token',
                    Authorization: 'Bearer <JSON Web Token>'
                },
            },
            mediaEmbed: {
                previewsInData: false,
            },
        })
        .then( editor => {
            window.editor = editor;
        })
        .catch( error => {
            console.error( 'Editor: Oops, something went wrong!' );
            console.error( error );
        });
    })
</script>