<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">
                        Team Table
                        <a href="<?= base_url('/admin/team/add')?>" class="float-right mt-1 text-primary" Title="Add team member"><i class="fa fa-plus-square-o"></i></a>
                    </strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                            <tr><th>Name</th><th>position</th><th>Last Updated</th><th>Actions</th></tr>
                        </thead>
                        <tbody>
                            <?php foreach ($team as $member){ ?>
                            <tr>
                                <td><?= $member['name'] ?></td>
                                <td><?= $member['position'] ?></td>
                                <td><?= $member['updated_at']? $member['updated_at'] : $member['created_at'] ?></td>
                                <td>
                                    <a href="<?= base_url("#team")?>" target="_blank" class="btn text-primary" title="Preview" ><i class="fa fa-eye"></i></a>
                                    <a href="<?= base_url("admin/team/update/{$member['id']}")?>" class="btn text-secondary" title="Edit" ><i class="fa fa-edit"></i></a>
                                    <a href="<?= base_url("admin/team/delete/{$member['id']}")?>" class="btn text-danger" title="Delete" ><i class="fa fa-trash-o"></i></a>
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