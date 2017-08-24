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
            <a class="navbar-brand"  href="javascript:(window.history.back());"  style="color: darkgray">	⇦ Step Back</a>
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

        <h3 style="margin-left: 10px;" >Chapter List</h3>
        <table class="table table-bordered" style="background-color: #F8F8F8; margin-left: 10px;">
            <thead>
            <tr>
                <th style="background-color: #329CD0;color: white">Chapters</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($chaptersOfBook as $eachBook){ ?>
                <tr>

                    <td>Chapter: <?= $eachBook->chapter ?><a style="float: right" href="/admin/chooseversus/<?= $eachBook->id?>"><button class="btn btn-success">Next</button></a></td>

                </tr>
            <?php  } ?>
            </tbody>
        </table>


        <!--           End of user manager list              -->
        <!-- /.row -->

    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="/js/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->

<!-- Custom Theme JavaScript -->
<script src="/js/sb-admin-2.js"></script>
<script src="/js/admin_dashboard.js"></script>


