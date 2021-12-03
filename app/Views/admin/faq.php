<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">
                        FAQs Table
                        <a href="<?= base_url('/admin/faq/add')?>" class="float-right mt-1 text-primary" Title="Add FAQ"><i class="fa fa-plus-square-o"></i></a>
                    </strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                            <tr><th>Question</th><th>Last Updated</th> <th>Actions</th></tr>
                        </thead>
                        <tbody>
                            <?php foreach ($faqs as $faq){ ?>
                            <tr>
                                <td><?= $faq['question'] ?></td>

                                <td><?= $faq['lastUpdated']? $faq['lastUpdated'] : $faq['dateAdded'] ?></td>
                                <td>
                                    <a href="<?= base_url("#faq")?>" target="_blank" class="btn text-primary" title="Preview" ><i class="fa fa-eye"></i></a>
                                    <a href="<?= base_url("admin/faq/update/{$faq['id']}")?>" class="btn text-secondary" title="Edit" ><i class="fa fa-edit"></i></a>
                                    <a href="<?= base_url("admin/faq/delete/{$faq['id']}")?>" class="btn text-danger" title="Delete" ><i class="fa fa-trash-o"></i></a>
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