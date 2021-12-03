<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Publiched
                    <strong class="card-title">
                        Projects
                    </strong>
                    <a href="<?= base_url('/admin/projects/new-project')?>" class="float-right mt-1 text-primary" Title="Add project"><i class="fa fa-plus-square-o"> New project</i></a>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                            <tr><th>Title</th><th>Categorie</th><th>Author</th><th>Last Updated</th> <th>Actions</th></tr>
                        </thead>
                        <tbody>
                            <?php foreach ($projects as $project){ ?>
                            <tr>
                                <td><?= $project['title'] ?> <?= $project['type'] != "published"? "({$project['type']})" : "" ?></td>
                                <td><?= $project['categorie'] ?></td>
                                <td><a class="text-primary" href="<?= base_url("admin/admins")?>"><?= $project['author'] ?></a></td>
                                <td><?= $project['lastUpdated']? $project['lastUpdated'] : $project['dateAdded'] ?></td>
                                <td>
                                    <?php if($project['type'] == "published"){ ?>
                                        <a href="<?= base_url("projects/{$project['id']}")?>" target="_blank" class="btn text-primary" title="Preview" ><i class="fa fa-eye"></i></a>
                                    <?php } ?>
                                    <a href="<?= base_url("admin/projects/update/{$project['id']}")?>" class="btn text-secondary" title="Edit" ><i class="fa fa-edit"></i></a>
                                    <a href="<?= base_url("admin/projects/delete/{$project['id']}")?>" class="btn text-danger" title="Delete" ><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>