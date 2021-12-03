<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">
                        Admins Table
                        <a href="<?= base_url('/admin/admins/add')?>" class="float-right mt-1 text-primary" Title="Add admin"><i class="fa fa-plus-square-o"></i></a>
                    </strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                            <tr><th>Name</th><th>Email</th><th>Phone Number</th> <th>Actions</th></tr>
                        </thead>
                        <tbody>
                            <?php foreach ($admins as $admin){ ?>
                            <tr>
                                <td>
                                    <?= $admin['name'] ?>
                                    <?= $admin['superAdmin'] ? '<span class="badge badge-primary float-right">Super Admin</span>' : '' ?>
                                </td>
                                <td><a href="mailto:<?= $admin['email'] ?>" class="text-primary"><?= $admin['email'] ?></a></td>
                                <td>
                                    <?php if ($admin['phoneNumber']){ ?>
                                    <a href="tel:<?= $admin['phoneNumber'] ?>" class="text-primary"><?= $admin['phoneNumber'] ?></a>
                                    <?php }else{ ?>
                                        -
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="<?= base_url("admin/admins/update/{$admin['id']}")?>" class="btn text-secondary" title="Edit" ><i class="fa fa-edit"></i></a>
                                    <a href="<?= base_url("admin/admins/delete/{$admin['id']}")?>" class="btn text-danger" title="Delete" ><i class="fa fa-trash-o"></i></a>
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