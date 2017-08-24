<?= $this->Flash->render() ?>
<?php $this->layout = 'admin_login_layout'; ?>


<div class="loader" style="display: none"></div>

<div class="container">
    <div class="inner_container">
    <section id="content">
        <form action="/admin/Admin/login" method="post">
            <h1>Admin Panel</h1>
            <div>
<!--                <input type="text" placeholder="Username" required="" id="username" />-->
                <?php  echo $this->Form->input('nickname',array('placeholder'=>'Nickname','class'=>'form-control',"label"=>false)); ?>
            </div>
            <div>
<!--                <input type="password" placeholder="Password" required="" id="password" />-->
                <?php echo  $this->Form->input('password',array('placeholder'=>'Password','class'=>'form-control',"label"=>false,'type' => 'password'));?>
            </div>
            <div>
                <input type="button" id="admin_log_in"  value="Log In"/>
                <input style="display: none" type="submit" id="admin_log_submit" value="Log in" />
<!--                <a href="#">Lost your password?</a>-->
<!--                <a href="#">Register</a>-->
            </div>
        </form><!-- form -->
        <div class="button">
        </div><!-- button -->
    </section><!-- content -->
</div><!-- container -->
</div>

<!--basic scripts-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- new library-->
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
<!--     -->

<script src="//ajax.aspnetcdn.com/ajax/jQuery.validate/1.11.1/jquery.validate.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="/js/admin_login.js"></script>
