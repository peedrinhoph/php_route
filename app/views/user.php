<?php $this->layout('master') ?>
<section class="h-100" style="background-color: #eee;">
    <div class="container h-100 py-5">
        <form method="post" action="/register">
            <div class="form-outline mb-4">
                <input type="name" name="name" class="form-control" />
                <label class="form-label" for="name">Name: </label>
            </div>
            <div class="form-outline mb-4">
                <input type="email" name="email" class="form-control" />
                <label class="form-label" for="email">Email: </label>
            </div>
            <div class="form-outline mb-4">
                <input type="password" name="password" class="form-control" />
                <label class="form-label" for="password">Password: </label>
            </div>
            <button type="submit" class="btn btn-primary btn-block mb-4">Cadastrar</button>
    </div>
    </form>
    </div>
</section>