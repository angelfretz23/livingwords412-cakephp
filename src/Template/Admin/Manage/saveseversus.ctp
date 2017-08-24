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

    <h3 style="margin-left: 10px;" >Choose Verses</h3>

    <form method='post' id='userform' action='/admin/havesaved'>
        <table class="table table-bordered" style="background-color: #F8F8F8; margin-left: 10px;" >
            <thead>
            <tr>
                <th style="background-color: #329CD0;color: white; text-align: center">Verses</th>
                <th  style="background-color: #329CD0;color: white; text-align: center">Tags</th>
              <!--  <th  style="background-color: #329CD0;color: white; text-align: center">Movie Tags</th>
                <th  style="background-color: #329CD0;color: white; text-align: center">Sermon Tags</th>
                <th  style="background-color: #329CD0;color: white; text-align: center">Music Tags</th>-->
                <th  style="background-color: #329CD0;color: white; text-align: center">Add tags</th>
            </tr>
            </thead>
            <tbody>
            <?php for($i = 0; $i < count($selectedVerses); $i++){ ?>
                <tr>
                    <td><?= $selectedVerses[$i][0]->verse?></td>
                    <td style=" text-align: center; font-weight: bold">
                        <?php for ($j = 0; $j < count($dataBooks[$i]); $j++){?>
                            <p><?php
                                    echo $dataBooks[$i][$j]['tag'];
                                ?></p>
                        <?php } ?>
                  <!--  </td>

                    <td style=" text-align: center; font-weight: bold">-->
                        <?php for ($j = 0; $j < count($dataMovie[$i]); $j++){?>
                            <p><?php
                                echo $dataMovie[$i][$j]['tag'];
                                ?></p>
                        <?php } ?>
                <!--    </td>

                    <td style=" text-align: center; font-weight: bold">-->
                        <?php for ($j = 0; $j < count($dataSermons[$i]); $j++){?>
                            <p><?php
                                echo $dataSermons[$i][$j]['tag'];
                                ?></p>
                        <?php } ?>
                  <!--  </td>

                    <td style=" text-align: center; font-weight: bold">-->
                        <?php for ($j = 0; $j < count($dataMusics[$i]); $j++){?>
                            <p><?php
                                echo $dataMusics[$i][$j]['tag'];
                                ?></p>
                        <?php } ?>
              <!--      </td>-->

                    <td>
                        <textarea type="text" class="form-control" id="usr" name="VerseTags[]" ></textarea>
                        <input type="hidden" class="form-control" id="usr" name="VerseID[]" value="<?= $selectedVerses[$i][0]->id?>">
                    </td>


                </tr>
            <?php  } ?>
            </tbody>
        </table>
        <!--            <input type='submit' class='btn btn-success' name="Next ->">-->
        <button style="margin-bottom: 20px; float: right;" class="btn btn-success" type="submit">Done</button>
    </form>


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


<!--<script>-->
<!---->
<!--    $(document).ready(function () {-->
<!--        swal("Please, select a book and tap NEXT")-->
<!--    });-->
<!--</script>-->

