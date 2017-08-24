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
        <h3>Users List</h3>
        <table class="table table-bordered" style="background-color: #F8F8F8">
            <thead>
            <tr>
                <th style="background-color: #329CD0;color: white; text-align: center">Email</th>
                <th style="background-color: #329CD0;color: white; text-align: center">Phone</th>
                <th style="background-color: #329CD0;color: white; text-align: center">created</th>
                <th style="background-color: #329CD0;color: white; text-align: center">banned</th>
                <th style="text-align: center; background-color: #329CD0;color: white">create media</th>
                <th style="text-align: center; background-color: #329CD0;color: white">Show user media</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($user as $eachUser){ ?>
                <tr>
                <td style=" text-align: center; font-weight: bold"><?= $eachUser->email ?></td>
                <td style=" text-align: center; font-weight: bold"><?= $eachUser->phone ?></td>
                <td style=" text-align: center; font-weight: bold"><?= $eachUser->created ?></td>
                <td style=" text-align: center">
                    <?php if($eachUser->banned == 0){ ?>
<!--                    <div class="slideThree" onclick="banFunction();">-->
                        <input type="checkbox" onclick="banned();" value="<?= $eachUser->id?>" class="checkbox_cls" id="slideThree_<?= $eachUser->id?>" name="check" />
<!--                        <label for="slideThree"></label>-->
<!--                    </div>-->
                </td>
                <?php }else{ ?>
                    <input type="checkbox" value="<?= $eachUser->id?>"  onclick="notBanned();" class="checkbox_cls" id="slideThree_<?= $eachUser->id?>" name="check"  checked/>
<!--                    <div class="slideThree">-->
<!--                        <input type="checkbox" value="banned" id="slideThree" name="check"  />-->
<!--                        <label for="slideThree"></label>-->
<!--                    </div>-->
                <?php } ?>
                    </td>
                <td style="text-align: center; color: green"><a href="/admin/first-step/<?= $eachUser->id?>"><i style="color: green" class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                <td style="text-align: center;color: #0000FF"><a href="/admin/edit/<?= $eachUser->id?>"><i style="color: gray" class="fa fa-folder" aria-hidden="true"></i></i></a></td>

            </tr>
            <?php  } ?>
            </tbody>
        </table>
        <!--           End of user manager list              -->
        <!-- /.row -->
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

