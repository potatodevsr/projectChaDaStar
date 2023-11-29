<div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h2>Login System</h2>
</div>
<form id="frm_data" class="needs-validation" novalidate="">
    <div class="d-flex justify-content-center">
        <div class="col-6">
            <div class="col-12">
                <label for="email" class="form-label">Email <span class="text-body-secondary">(Optional)</span></label>
                <input type="email" class="form-control" required id="email" name="email" placeholder="Enter your email" value="<?= isset($userData) ? $userData->email : '' ?>">
                <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
                </div>
            </div>
            <div class="col-12">
                <label for="Password" class="form-label">Password</label>
                <input type="password" class="form-control" required id="password" name="password" placeholder="Enter your password" value="<?= isset($userData) ? $userData->password : '' ?>">
            </div>
            <hr class="my-4">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-warning mr-2">Register</button>
                    <button id="btn_login" type="button" class="btn btn-success mr-2">Login</button>
                    <button type="button" class="btn btn-info">Repassword</button>
                </div>
            </div>

        </div>
    </div>
</form>