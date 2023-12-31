<?php $this->insert('partials/head') ?>

<section class="py-5">

    <div class="container col-md-6 py-5 rounded" style="background-color: #eee; align-content:center !important;">
        <div class="col-md-12 py-4 text-center">
            <h3>Forgot Password</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="/new-register">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="email">Email: </label>
                        <input type="email" name="email" class="form-control" value="1@gg.com" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mb-4">Forgot Password</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php $this->insert('partials/footer') ?>