<?php $this->layout = 'admin_dashboard_layout'; ?>
<?= $this->Flash->render() ?>
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background-color:#373C47;">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/admin/users/manage" style="color: darkgray">Admin panel</a>
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

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            Manager:
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href="#" style="color: black"><i class="fa fa-bar-chart-o fa-fw"></i> User manager<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li >
                                <a style="color: black" href="/admin/users/manage">Users</a>
                            </li>
                            <li >
                                <a style="color: black" href="/admin/media">Add media</a>
                            </li>
                            <li >
                                <a style="color: black" href="/admin/choosebook-multiply">Manage the content</a>
                            </li>
                            <!-- <li>
                                <a href="morris.html">Morris.js Charts</a>
                            </li> -->
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>
<!--               User manager list               -->
    <div id="page-wrapper">
        <form method='post' id='userform' action='/admin/fillform'>
            <label for="sel1" style="margin-top: 20px">Select media type:</label>
            <select class="form-control" id="media_type" name="media_type" style="margin-bottom: 20px">
                <option>movie</option>
                <option>music</option>
                <option>sermon</option>
                <option>book</option>
            </select>
            <button style="margin-bottom: 20px; float: right;" class="btn btn-success" type="submit">Next -></button>
        </form>

    </div>
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

<script>
//function banned() {
//    alert('not banned');
//}
//function notBanned() {
//    alert('banned');
//}
</script>

