<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <strong>Contact</strong> information
                    </div>
                    <div class="card-body card-block">
                        <form action="" method="post" class="form-horizontal">
                            <input type="hidden" name="contacts" value="1">
                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <label for="phone" class="form-control-label">Phone number</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        <input class="form-control is-valid" id="phone" name="phone" type="text" placeholder="Phone number" value="<?= $contact['phone'] ?>">
                                        <div class="valid-feedback">%s updated successfully</div>
                                        <div class="invalid-feedback">%s connot be empty.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <label for="fax" class="form-control-label">Fax number</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-fax"></i></div>
                                        <input class="form-control is-valid" id="fax" name="fax" type="text" placeholder="Fax number" value="<?= $contact['fax'] ?>">
                                        <div class="valid-feedback">%s updated successfully</div>
                                        <div class="invalid-feedback">%s connot be empty.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <label for="gsm" class="form-control-label">Gsm number</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-mobile"></i></div>
                                        <input class="form-control is-valid" id="gsm" name="gsm" type="text" placeholder="Gsm number" value="<?= $contact['gsm'] ?>">
                                        <div class="valid-feedback">%s updated successfully</div>
                                        <div class="invalid-feedback">%s connot be empty.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <label for="email" class="form-control-label">Email address</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                                        <input class="form-control is-valid" id="email" name="email" type="text" placeholder="Email address" value="<?= $contact['email'] ?>">
                                        <div class="valid-feedback">%s updated successfully</div>
                                        <div class="invalid-feedback">%s connot be empty.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <label for="address" class="form-control-label">Address</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                                        <input class="form-control is-valid" id="address" name="address" type="text" placeholder="Address" value="<?= $contact['address'] ?>">
                                        <div class="valid-feedback">%s updated successfully</div>
                                        <div class="invalid-feedback">%s connot be empty.</div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-success btn-sm float-right">
                                <i class="fa fa-dot-circle-o"></i> Save changes
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <strong>Social media</strong> links
                    </div>
                    <div class="card-body card-block">
                        <form action="submit" method="post" class="form-horizontal">
                            <input type="hidden" name="social" value="1">

                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-btn">
                                            <a class="btn btn-primary" href="<?= $social['facebook'] ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                                        </div>
                                        <input class="form-control is-invalid" name="facebook" type="text" placeholder="Facebook page URL" value="<?= $social['facebook'] ?>">
                                        <div class="valid-feedback">%s updated successfully</div>
                                        <div class="invalid-feedback">%s connot be empty.</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-btn">
                                            <a class="btn btn-primary" href="<?= $social['instagram'] ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                                        </div>
                                        <input class="form-control" name="instagram" type="text" placeholder="Instagram page URL" value="<?= $social['instagram'] ?>">
                                        <div class="valid-feedback">%s updated successfully</div>
                                        <div class="invalid-feedback">%s connot be empty.</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-btn">
                                            <a class="btn btn-primary" href="<?= $social['linked_in'] ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                                        </div>
                                        <input class="form-control is-valid" name="linked_in" type="text" placeholder="LinkedIn page URL" value="<?= $social['linked_in'] ?>">
                                        <div class="valid-feedback">%s updated successfully</div>
                                        <div class="invalid-feedback">%s connot be empty.</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-btn">
                                            <a class="btn btn-primary" href="<?= $social['youtube'] ?>" target="_blank"><i class="fa fa-youtube"></i></a>
                                        </div>
                                        <input class="form-control is-valid" name="youtube" type="text" placeholder="Youtube chanel URL" value="<?= $social['youtube'] ?>">
                                        <div class="valid-feedback">%s updated successfully</div>
                                        <div class="invalid-feedback">%s connot be empty.</div>
                                    </div>
                                </div>
                            </div>
                            
                            <hr>
                            <button type="submit" class="btn btn-success btn-sm float-right">
                                <i class="fa fa-dot-circle-o"></i> Save changes
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>