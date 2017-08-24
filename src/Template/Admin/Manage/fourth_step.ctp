<?php $this->layout = 'admin_dashboard_layout'; ?>
<?= $this->Flash->render() ?>
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

        <?php if($mediaType == 'movie'){?>
            <h3>Create Movie</h3>
        <?php }elseif($mediaType == 'music'){ ?>
            <h3>Create Music</h3>
        <?php }elseif($mediaType == 'book'){?>
            <h3>Create Book</h3>
        <?php }elseif($mediaType == 'sermon'){?>
            <h3>Create Sermon</h3>
        <?php } ?>





        <form method='post' id='userform' action='/admin/save-media'>


            <?php if($mediaType == 'movie'){?>

                <label for="sel1" style="margin-top: 20px">Movie name:</label>
                <input type="text" class="form-control" id="usr" name="movie_name">

                <label for="sel1" style="margin-top: 20px">Description:</label> <!--<new>-->
                <input type="text" class="form-control" id="usr" name="description">

                <label for="sel1" style="margin-top: 20px">Director name:</label>
                <input type="text" class="form-control" id="usr" name="director_name">

                <label for="sel1" style="margin-top: 20px">Actors:</label>
                <input type="text" class="form-control" id="usr" name="actor_name">

                <label for="sel1" style="margin-top: 20px">Release date:</label> <!--new-->
                <input type="text" class="form-control" id="usr" name="release_date">

                <label for="sel1" style="margin-top: 20px">Media link:</label>
                <input type="text" class="form-control" id="usr" name="media_link">

                <label for="sel1" style="margin-top: 20px">Tags:</label>
                <input type="text" class="form-control" id="usr" name="tags">

                <input type="hidden" name="media_type" value="<?= $mediaType?>">
                <?php foreach ($arrVerseIds as $arrV) {?>
                <input type="hidden" name="media_ids[]" value="<?= $arrV?>">
<?php }?>




            <?php }elseif($mediaType == 'music'){ ?>
                <label for="sel1" style="margin-top: 20px">Song name:</label> <!--new-->
                <input type="text" class="form-control" id="usr" name="song_name">


                <label for="sel1" style="margin-top: 20px">Relevant lyrics:</label> <!--new-->
                <input type="text" class="form-control" id="usr" name="relevant_lyrics">

                <label for="sel1" style="margin-top: 20px">Artist name:</label>
                <input type="text" class="form-control" id="usr" name="artist_name">

                <label for="sel1" style="margin-top: 20px">Writer name:</label>
                <input type="text" class="form-control" id="usr" name="writer_name">

                <label for="sel1" style="margin-top: 20px">Song story:</label>
                <textarea type="text" class="form-control" id="usr" name="song_story"></textarea>

                <label for="sel1" style="margin-top: 20px">Release Date:</label>
                <input type="text" class="form-control" id="usr" name="release_date">

                <label for="sel1" style="margin-top: 20px">Album:</label>
                <input type="text" class="form-control" id="usr" name="album">

                <label for="sel1" style="margin-top: 20px">Media link:</label>
                <input type="text" class="form-control" id="usr" name="media_link">

                <label for="sel1" style="margin-top: 20px">Tags:</label>
                <input type="text" class="form-control" id="usr" name="tags">

                <input type="hidden" name="media_type" value="<?= $mediaType?>">
                <?php foreach ($arrVerseIds as $arrV) {?>
                    <input type="hidden" name="media_ids[]" value="<?= $arrV?>">
                <?php }?>





            <?php }elseif($mediaType == 'book'){?>
                <label for="sel1" style="margin-top: 20px">Book name:</label>
                <input type="text" class="form-control" id="usr" name="book_name">

                <label for="sel1" style="margin-top: 20px">Description:</label> <!--new-->
                <input type="text" class="form-control" id="usr" name="description">


                <label for="sel1" style="margin-top: 20px">Author name:</label>
                <input type="text" class="form-control" id="usr" name="author_name">

                <label for="sel1" style="margin-top: 20px">Book date:</label> <!--new-->
                <input type="text" class="form-control" id="usr" name="book_date">

                <label for="sel1" style="margin-top: 20px">Media link:</label>
                <input type="text" class="form-control" id="usr" name="media_link">
                
            <!--    <label for="sel1" style="margin-top: 20px">Summary:</label>
                <input type="text" class="form-control" id="usr" name="summary">-->

                <label for="sel1" style="margin-top: 20px">Tags:</label>
                <input type="text" class="form-control" id="usr" name="tags">

                <input type="hidden" name="media_type" value="<?= $mediaType?>">
                <?php foreach ($arrVerseIds as $arrV) {?>
                    <input type="hidden" name="media_ids[]" value="<?= $arrV?>">
                <?php }?>





            <?php }elseif($mediaType == 'sermon'){?>
                <label for="sel1" style="margin-top: 20px">Sermon title:</label>
                <input type="text" class="form-control" id="usr" name="sermon_title">

                <label for="sel1" style="margin-top: 20px">Description:</label>
                <input type="text" class="form-control" id="usr" name="description">


                <label for="sel1" style="margin-top: 20px">Pastor name:</label>
                <input type="text" class="form-control" id="usr" name="pastor_name">

                <label for="sel1" style="margin-top: 20px">Church name</label> <!--new-->
                <input type="text" class="form-control" id="usr" name="church_name">

                <label for="sel1" style="margin-top: 20px">Sermon date</label>
                <input type="text" class="form-control" id="usr" name="sermon_date">

                <label for="sel1" style="margin-top: 20px">Media link:</label>
                <input type="text" class="form-control" id="usr" name="media_url">

                <label for="sel1" style="margin-top: 20px">Tags:</label> <!--new-->
                <input type="text" class="form-control" id="usr" name="tags">

                <input type="hidden" name="media_type" value="<?= $mediaType?>">
                <?php foreach ($arrVerseIds as $arrV) {?>
                    <input type="hidden" name="media_ids[]" value="<?= $arrV?>">
                <?php }?>

            <?php } ?>

            <button style="margin-bottom: 20px; float: right;margin-top: 30px" class="btn btn-success" type="submit">Save</button>

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
    $('.btn-success').on('click', function (e) {
        swal("Good job!", "The book saved", "success");
    });
</script>

