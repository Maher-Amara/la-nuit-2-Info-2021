<div class="login-form">
    <form>
        <div class="form-group">
            <label>User Name</label>
            <input type="email" class="form-control" placeholder="User Name">
        </div>

        <div class="form-group">
            <label>Email address</label>
            <input type="email" class="form-control" placeholder="Email">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Password">
        </div>
        
        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" style="margin-top:30px">Register</button>
        
        <div class="register-link text-center"  style="margin-top:15px">
            <p>Already have account ? <a href="<?= base_url('admin/authentication') ?>"> Sign in</a></p>
        </div>
    </form>
</div>