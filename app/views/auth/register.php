<?php $this->insert('partials/head') ?>

<section class="py-5">

    <div class="container col-md-6 py-5 rounded" style="background-color: #eee; align-content:center !important;">
        <div class="col-md-12 py-4 text-center">
            <h3>Register</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="/create">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="name">Name: </label>
                        <input type="name" name="name" class="form-control" />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="email">Email: </label>
                        <input type="email" name="email" class="form-control" />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="password">Password: </label>
                        <input type="password" name="password" class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mb-4">Register</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php $this->insert('partials/footer') ?>