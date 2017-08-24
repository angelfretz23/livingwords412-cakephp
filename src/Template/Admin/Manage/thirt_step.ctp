<?php $this->layout = 'admin_dashboard_layout'; ?>
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background-color: #373C47">
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
                            <li>
                                <a style="color: black" href="/admin/users/manage">Users</a>
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

        <h3>Verses List</h3>
        <form method='post' id='userform' action='/admin/fourth-step'>
            <label for="sel1" style="margin-top: 20px">Select media type:</label>
            <select class="form-control" id="media_type" name="media_type" style="margin-bottom: 20px">
                <option>movie</option>
                <option>music</option>
                <option>sermon</option>
                <option>book</option>
            </select>
        <table class="table table-bordered" style="background-color: #F8F8F8">
            <thead>
            <tr>
                <th style="background-color: #329CD0;color: white; text-align: center">Verses</th>
                <th style="background-color: #329CD0;color: white">Select verse</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($chapterVerses as $eachVerse){ ?>
                <tr>
                    <td><?= $eachVerse->verse ?></td>
                    <td>

                    <input type='checkbox' name='arrayOfVerseIds[]' value='<?= $eachVerse->id?>'><br>


                    </td>

                </tr>
            <?php  } ?>
            </tbody>
        </table>
<!--            <input type='submit' class='btn btn-success' name="Next ->">-->
            <button style="margin-bottom: 20px; float: right;" class="btn btn-success" type="submit">Next -></button>
        </form>

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

<!--<script>-->
<!---->
<!--    $(document).ready(function () {-->
<!--        swal("Please, select media type, and verses from list!", "You can choose one or more verses")-->
<!--    });-->
<!---->
<!--</script>-->
