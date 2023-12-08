<?php $this->insert('partials/head') ?>

<section class="py-5">

    <div class="container col-md-6 py-5 rounded" style="background-color: #eee; align-content:center !important;">
        <div class="col-md-12 py-4 text-center">
            <h3>Login</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="/auth">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="email">Email: </label>
                        <input type="email" name="email" class="form-control" required/>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="password">Password: </label>
                        <input type="password" name="password" class="form-control"  required />
                    </div>
                    <button type="submit" class="btn btn-primary btn-medium w-100 rounded-5 text-uppercase">Login</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php $this->insert('partials/footer') ?>