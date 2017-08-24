<?= $this->Flash->render() ?>


<div class="container">
    <div class="row main">

        <div class="main-login main-center">
            <?= $this->Form->create(null, ['type' => 'file', 'id' => 'form-register'], ['url' => ['controller' => 'Admin.Admin', 'action' => 'register']]); ?>

            <div class="form-group">
                <label for="name" class="cols-sm-2 control-label">Login</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>

                        <?= $this->Form->input(null, ['class' => 'form-control', 'placeholder' => 'Login', 'name' => 'nickname']); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="cols-sm-2 control-label">Email</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>

                        <?= $this->Form->input(null, ['class' => 'form-control', 'placeholder' => 'Email', 'name' => 'email']); ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">Password</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>

                        <?= $this->Form->input(null, ['type' => 'password', 'id'=> 'password', 'class' => 'form-control' , 'placeholder' => 'Password', 'name' => 'password']); ?>
                    </div>
                </div>
            </div>



            <div class="form-group ">
                <?= $this->Form->button('CREATE MY ACCOUNT', ['class' => 'btn btn-primary btn-lg btn-block login-button', 'type' => 'submit']); ?>
            </div>

            <?= $this->Form->end(); ?>
        </div>
    </div>
</div>

<script type="text/javascript" src="assets/js/bootstrap.js"></script>
