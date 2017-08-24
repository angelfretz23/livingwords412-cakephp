<?= $this->Flash->render() ?>


<!-- BEGIN Main Content -->
<div class="login-wrapper">
    <!-- BEGIN Login Form -->
    <?=$this->Flash->render('auth') ?>
    <form id="form-login" action="login" method="POST" name="loginform" accept-charset="utf-8">
        <h3>Login</h3>
        <hr/>
        <div class="form-group">
            <div class="controls">
                <?php  echo $this->Form->input('email',array('placeholder'=>'Login','class'=>'form-control',"label"=>false)); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="controls">
                <?php echo  $this->Form->input('password',array('placeholder'=>'Password','class'=>'form-control',"label"=>false,'type' => 'password'));?>
            </div>
        </div>



        <div class="form-group">
            <div class="controls">
                <button type="submit" class="btn btn-primary form-control">Sign In</button>
            </div>
        </div>
        <!-- <hr/>
        <p class="clearfix">
            <a href="#" class="goto-forgot pull-left">Forgot Password?</a>
            <a href="#" class="goto-register pull-right">Sign up now</a>
        </p> -->
    </form>
    <!-- END Login Form -->

</div>
<!-- END Main Content -->


<!--basic scripts-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- new library-->
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
<!--     -->

<script src="//ajax.aspnetcdn.com/ajax/jQuery.validate/1.11.1/jquery.validate.js" type="text/javascript"></script>


<script type="text/javascript">
    $("#form-login").validate({
        rules: {
            login: {required: true},
            pass: {required: true}
        },
        messages: {
            // example5: "Just check the box<h5 class='text-danger'>You aren't going to read the EULA</h5>",
            // login:"Enter your login",
            // pass:"Enter your password",
        },
        tooltip_options: {
            login: {trigger:'focus'},
            login: {placement:'right',html:true}
        },
    });
</script>

<style>
    .error{
        color:red;
    }
</style>