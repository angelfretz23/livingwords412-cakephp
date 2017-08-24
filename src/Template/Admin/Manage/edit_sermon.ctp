<?php $this->layout = 'admin_dashboard_layout'; ?>
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #373C47">
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

        <div style="width: 50%; margin-top: 60px">
            <form method='post' id='userform' action='/admin/update-sermon/<?= $sermon->id?>-<?= $verseID?>'  enctype="multipart/form-data">
                <label for="usr" style="margin-top: 20px">Sermon title:</label>
                <input type="text" class="form-control" id="usr" name="semon_title" value="<?= $sermon->semon_title?>">

                <label for="usr" style="margin-top: 20px">Description:</label>
                <input type="text" class="form-control" id="usr" name="description" value="<?= $sermon->description?>">

                <label for="usr" style="margin-top: 20px">Pastor name:</label>
                <input type="text" class="form-control" id="usr" name="pastor_name" value="<?= $sermon->pastor_name?>">

                <label for="usr" style="margin-top: 20px">Church name</label> <!--new-->
                <input type="text" class="form-control" id="usr" name="church_name" value="<?= $sermon->church_name?>">

                <label for="usr" style="margin-top: 20px">Sermon date</label>
                <input type="text" class="form-control" id="usr" name="sermon_date" value="<?= $sermon->sermon_date?>">

                <label for="usr" style="margin-top: 20px">Media link:</label>
                <input type="text" class="form-control" id="usr" name="media_url" value="<?= $sermon->media_url?>">
                <?php if($verseID !== 'user'){?>
                <label for="sel1" style="margin-top: 20px">Media File:</label>
                <?if(!empty($attachFile[0])){?>
                    <div id="<?= $attachFile[0]->sermon_id?>-file">
                        <?php
                        echo '<a href="/admin/look_file/'.$attachFile[0]->id.'">'.$attachFile[0]->name.'</a>';
                        ?>

                        <button onclick="deleteFile('<?= $attachFile[0]->sermon_id?>-file', 'sermon', <?= $verseID?>);" style="margin-bottom: 10px" type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </button>
                    </div>
                <?}else{?>
                    <br><button onclick="addFieldFile();" style="margin-bottom: 10px" type="button" class="btn btn-info " id="addFileButton">
                        <span class="glyphicon glyphicon-tag " aria-hidden="true"></span> Add
                    </button>
                    <br>
                <?}?>
                <div id="newFile">
                </div>
                <?php }?>

                <label for="usr" style="margin-top: 20px">Tags:</label> <!--new-->
                <br><button onclick="addField();" style="margin-bottom: 10px" type="button" class="btn btn-info">
                    <span class="glyphicon glyphicon-tag " aria-hidden="true"></span> Add
                </button>
                <br>
                <div id="add_field_area">
                    <?php foreach ($sermonTags as $sermonTag){ ?>
                        <div  class="add" id="<?= $sermonTag->id?>">
                            <div class="input-group">
                                <input type="text" style="margin-bottom: 10px" class="form-control" id="usr" name="tags[]" value="<?= $sermonTag->tag_name?>">

                                <span class="input-group-btn">
                            <button onclick="deleteField(<?= $sermonTag->id?>, 'sermon');" style="margin-bottom: 10px" type="button" class="btn btn-danger">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </button>
                        </span>
                                <input type="hidden" style="margin-bottom: 10px" class="form-control" id="usr" name="tagsId[]" value="<?= $sermonTag->id?>">
                            </div>
                        </div>
                    <?php  } ?>
                </div>
                <button style="margin-top: 20px; float: left" type="submit" class="btn btn-success"> Save</button>
            </form>
        </div>

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
    $('.btn-success').on('click', function (e) {
        swal("Good job!", "The book saved", "success");
    });
</script>

