<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">
                    Categories Table
                        <a href="<?= base_url('/admin/categories/add')?>" class="float-right mt-1 text-primary" Title="Add categorie"><i class="fa fa-plus-square-o"></i></a>
                    </strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                            <tr><th>Categorie</th><th>Projects count</th><th>Last Updated</th> <th>Actions</th></tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categories as $categorie){ ?>
                            <tr>
                                <td><?= $categorie['title'] ?></td>
                                <td><?= $categorie['nbrProjects'] ?></td>
                                <td><?= $categorie['lastUpdated']? $categorie['lastUpdated'] : $categorie['dateAdded'] ?></td>
                                <td>
                                    <?php if ($categorie['nbrProjects']){ ?>
                                    <a href="<?= base_url("categorie/{$categorie['id']}")?>" target="_blank" class="btn text-primary" title="Preview"><i class="fa fa-eye"></i></a>
                                    <?php } ?>
                                    <a href="<?= base_url("admin/categories/update/{$categorie['id']}")?>" class="btn text-secondary" title="Edit" ><i class="fa fa-edit"></i></a>
                                    <a href="<?= base_url("admin/categories/delete/{$categorie['id']}")?>" class="btn text-danger" title="Delete" ><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><!-- .animated -->