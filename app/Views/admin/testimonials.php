<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">
                        Testimonials Table
                        <a href="<?= base_url('/admin/testimonials/add')?>" class="float-right mt-1 text-primary" Title="Add testimonial"><i class="fa fa-plus-square-o"></i></a>
                    </strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                            <tr><th>Nom</th><th>Status</th><th>Saying</th><th>Last Updated</th><th>Actions</th></tr>
                        </thead>
                        <tbody>
                            <?php foreach ($testimonials as $testimonial){ ?>
                            <tr>
                                <td><?= $testimonial['nom'] ?></td>
                                <td><?= $testimonial['status'] ?></td>
                                <td><?= $testimonial['saying'] ?></td>
                                <td><?= $testimonial['lastUpdated']? $testimonial['lastUpdated'] : $testimonial['dateAdded'] ?></td>
                                <td>
                                    <a href="<?= base_url("#testimonials")?>" target="_blank" class="btn text-primary" title="Preview" ><i class="fa fa-eye"></i></a>
                                    <a href="<?= base_url("admin/testimonials/update/{$testimonial['id']}")?>" class="btn text-secondary" title="Edit" ><i class="fa fa-edit"></i></a>
                                    <a href="<?= base_url("admin/testimonials/delete/{$testimonial['id']}")?>" class="btn text-danger" title="Delete" ><i class="fa fa-trash-o"></i></a>
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