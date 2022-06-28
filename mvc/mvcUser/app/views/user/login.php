<div class="container">
    <div class="row mt-3 justify-content-center">
        <div class="col-4">
            <div class="card text-center">
                <div class="card-header">
                    Form Login
                </div>
                <div class="card-body">
                    <form action="<?= BASEURL; ?>/user/prosesLogin" method="post">
                        <div class="mb-3">
                            <label for="luser" class="form-label">Username</label>
                            <input type="text" name="tuser" id="iduser" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="lpass" class="form-label">Password</label>
                            <input type="password" name="tpass" id="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Login</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-muted">
                    <p class="card-text">Login untuk membeli produk</p>
                </div>
            </div>
        </div>
    </div>
</div>