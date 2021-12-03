<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">
                        Pages Table
                        <a href="<?= base_url('/admin/faq/add')?>" class="float-right mt-1 text-primary" Title="Add FAQ"><i class="fa fa-plus-square-o"></i></a>
                    </strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                            <tr><th>Page</th><th>Last Updated</th><th>Actions</th></tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pages as $page){ ?>
                            <tr>
                                <td><?= $page['title'] ?></td>
                                <td><?= $page['updated_at']? $page['updated_at'] : $page['created_at'] ?></td>
                                <td>
                                    <a href="<?= base_url("admin/seo/page-meta/{$page['name_id']}") ?>" class="btn text-primary" title="Preview" ><i class="fa fa-eye"></i></a>
                                    <a href="<?= base_url("admin/seo/update_page_meta/{$page['name_id']}")?>" class="btn text-secondary" title="Edit" ><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>