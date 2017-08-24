<?php $this->layout = 'admin_dashboard_layout'; ?>
<div id="wrapper" >

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #373C47">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="javascript:(closeWindow());"   style="color: darkgray">	⇦ Close</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">

            <!-- /.dropdown -->

            <!-- /.dropdown -->

            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: darkgray">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <!--                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>-->
                    <!--                    </li>-->
                    <!--                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>-->
                    <!--                    </li>-->
                    <!--                    <li class="divider"></li>-->
                    <li><a href="/admin/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->


    </nav>
    <!--               User manager list               -->

        <h3 style="margin-left: 10px;">Books List </h3>


    <table class="table table-bordered" style="background-color: #F8F8F8; margin-left: 10px;">
            <thead>
            <tr>
                <th style="background-color: #329CD0;color: white">Book Name</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($books as $eachBook){ ?>
                <tr>
                    <td><?= $eachBook->book_name ?><a style="float: right" href="/admin/choosechapter/<?= $eachBook->id?>"><button class="btn btn-success">Next</button></a></td>

                </tr>
            <?php  } ?>
            </tbody>
        </table>


        <div class="paginator" style="text-align: center"> <ul class="pagination"> <?= $this->Paginator->prev('< ' . __('previous')) ?> <?= $this->Paginator->numbers() ?> <?= $this->Paginator->next(__('next') . ' >') ?> </ul> </div>


</div>

<form method='post' id='userform' action='/admin/saveseversus'>
    <table class="table table-bordered" style="background-color: #F8F8F8; margin-left: 10px;" id="table">
        <thead>
        <tr>
            <th style="background-color: #329CD0;color: white; text-align: center">Verses</th>
            <th style="background-color: #329CD0;color: white">Select verse</th>
            <th  style="background-color: #329CD0;color: white; text-align: center">See content</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <!--            <input type='submit' class='btn btn-success' name="Next ->">-->
    <button style="margin-bottom: 20px; float: right;" class="btn btn-success" type="submit">Next</button>
</form>
<!-- /#wrapper -->

<!-- jQuery -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="/js/metisMenu.min.js"></script>
<script src="/dist/js/bootstrap-select.js"></script>

<!-- Morris Charts JavaScript -->

<!-- Custom Theme JavaScript -->
<script src="/js/sb-admin-2.js"></script>
<script src="/js/admin_dashboard.js"></script>
<script>
    function closeWindow() {
        window.close();
        window.history.go(-1);
    }
    $('.selectpicker').selectpicker();
</script>

<!--<script>-->
<!---->
<!--    $(document).ready(function () {-->
<!--        swal("Please, select a book and tap NEXT")-->
<!--    });-->
<!--</script>-->

