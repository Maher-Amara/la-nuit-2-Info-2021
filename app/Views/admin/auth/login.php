<div class="login-form">

    <?php if(!empty(session()->getFlashdata('loginFail'))){ ?>
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        <ul><li><?= session()->getFlashdata('loginFail') ?></li></ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php } elseif(isset($validation)){?>
    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        <?=  $validation->listErrors() ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php } ?>
    
    <form action="<?= site_url('admin/authentication/login_validation') ?>" method="post">
        <?= csrf_field(); ?>
        
        <div class="form-group">
            <label>Email address</label>
            <input name="email" type="email" class="form-control" placeholder="Email" value="<?= set_value('email') ?>" required>
            <span class="text-danger"></span>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input name="password" type="password" class="form-control" placeholder="Password" required>
        </div>
        
        <div class="checkbox">
            <label class="pull-right">
                <a href="<?= site_url('admin/authentication/forgot-password') ?>">Forgotten Password?</a>
            </label>

        </div>
        
        <button type="submit" class="btn btn-success btn-flat" style="margin-top:30px">Sign in</button>
    </form>
</div>