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
        <h3 style="text-align: center;font-weight: bold;margin-bottom: 60px">User data</h3>


        <div id="exTab2" class="container">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a  href="#1" data-toggle="tab">Book</a>
                </li>
                <li><a href="#2" data-toggle="tab">Sermon</a>
                </li>
                <li><a href="#3" data-toggle="tab">Music</a>
                </li>
                <li><a href="#4" data-toggle="tab">Movie</a>
                </li>
            </ul>

            <div class="tab-content ">
                <div class="tab-pane active" id="1">
                    <h2>Book data</h2>
                    <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th  style="background-color: #329CD0;color: white; text-align: center">Book name:</th>
                                <th  style="background-color: #329CD0;color: white; text-align: center">Description:</th>
                                <th  style="background-color: #329CD0;color: white; text-align: center">Author name:</th>
                                <th  style="background-color: #329CD0;color: white; text-align: center">Book date:</th>
                                <th  style="background-color: #329CD0;color: white; text-align: center">Media Link</th>
                                <th  style="background-color: #329CD0;color: white; text-align: center">Media File</th>
                                <th  style="background-color: #329CD0;color: white; text-align: center">Tags:</th>
                                <th  style="background-color: #329CD0;color: white; text-align: center">Edit</th>
                                <th  style="background-color: #329CD0;color: white; text-align: center">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($books as $book){?>
                            <tr>
                                <td style=" text-align: center; font-weight: bold"><?= $book[0]->book_name?></td>
                                <td style=" text-align: center; font-weight: bold"><?= $book[0]->description?></td>
                                <td style=" text-align: center; font-weight: bold"><?= $book[0]->author_name?></td>
                                <td style=" text-align: center; font-weight: bold"><?= $book[0]->book_date?></td>
                                <td style=" text-align: center; font-weight: bold"><?= $book[0]->media_link?></td>
                                <td  style=" text-align: center; font-weight: bold">
                                    <?php if(!empty($book[2][0])){
                                        echo '<a href="/admin/look_file/'.$book[2][0]->id.'-book">'.$book[2][0]->name.'</a>';
                                    }
                                    ?>
                                </td>
                                <td style=" text-align: center; font-weight: bold">
                                    <?php foreach ($book[1] as $tags){?>
                                        <p><?= $tags->tag_name?></p>
                                    <?php } ?>
                                </td>
                                <td  style=" text-align: center; font-weight: bold"><a href="/admin/edit-book/<?= $book[0]->id?>-<?=$versusID?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                <td  style=" text-align: center; font-weight: bold"><a href="/admin/delete-book-admin/<?= $book[0]->id?>-<?= $versusID?>"><i id="book_id" style="color:red;" class="fa fa-times" aria-hidden="true"></i></a></td>
                            </tr>
                            <?php } ?>
                            </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="2">
                    <h2>Sermon data:</h2>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th  style="background-color: #329CD0;color: white; text-align: center">Sermon title</th>
                            <th  style="background-color: #329CD0;color: white; text-align: center">Description</th>
                            <th  style="background-color: #329CD0;color: white; text-align: center">Pastor name</th>
                            <th  style="background-color: #329CD0;color: white; text-align: center">Church name</th>
                            <th  style="background-color: #329CD0;color: white; text-align: center">Sermon date</th>
                            <th  style="background-color: #329CD0;color: white; text-align: center">Media url</th>
                            <th  style="background-color: #329CD0;color: white; text-align: center">Media File</th>
                            <th  style="background-color: #329CD0;color: white; text-align: center">Tags</th>
                            <th  style="background-color: #329CD0;color: white; text-align: center">Edit</th>
                            <th  style="background-color: #329CD0;color: white; text-align: center">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($sermon as $ser){?>
                            <tr>
                                <td style=" text-align: center; font-weight: bold"><?= $ser[0]->semon_title?></td>
                                <td style=" text-align: center; font-weight: bold"><?= $ser[0]->description?></td>
                                <td style=" text-align: center; font-weight: bold"><?= $ser[0]->pastor_name?></td>
                                <td style=" text-align: center; font-weight: bold"><?= $ser[0]->church_name?></td>
                                <td style=" text-align: center; font-weight: bold"><?= $ser[0]->sermon_date?></td>
                                <td style=" text-align: center; font-weight: bold"><?= $ser[0]->media_url?></td>
                                <td  style=" text-align: center; font-weight: bold">
                                    <?php if(!empty($ser[2][0])){
                                        echo '<a href="/admin/look_file/'.$ser[2][0]->id.'-sermon">'.$ser[2][0]->name.'</a>';
                                    }
                                    ?>
                                </td>
                                <td style=" text-align: center; font-weight: bold">
                                    <?php foreach ($ser[1] as $tags){?>
                                        <p><?= $tags->tag_name?></p>
                                    <?php } ?>
                                </td>
                                <td  style=" text-align: center; font-weight: bold"><a href="/admin/edit-sermon/<?= $ser[0]->id?>-<?= $versusID?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                <td  style=" text-align: center; font-weight: bold"><a href="/admin/delete-sermon-admin/<?= $ser[0]->id?>-<?= $versusID?>"><i id="book_id" style="color:red;" class="fa fa-times" aria-hidden="true"></i></a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="3">
                    <h2>Music data: </h2>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th  style="background-color: #329CD0;color: white; text-align: center">Song name</th>
                            <th  style="background-color: #329CD0;color: white; text-align: center">Relevant lyrics</th>
                            <th  style="background-color: #329CD0;color: white; text-align: center">Artist name</th>
                            <th  style="background-color: #329CD0;color: white; text-align: center">Writer name</th>
                            <th  style="background-color: #329CD0;color: white; text-align: center">Song story</th>
                            <th  style="background-color: #329CD0;color: white; text-align: center">Release Date</th>
                            <th  style="background-color: #329CD0;color: white; text-align: center">Album</th>
                            <th  style="background-color: #329CD0;color: white; text-align: center">Media link</th>
                            <th  style="background-color: #329CD0;color: white; text-align: center">Media File</th>
                            <th  style="background-color: #329CD0;color: white; text-align: center">Tags</th>
                            <th  style="background-color: #329CD0;color: white; text-align: center">Edit</th>
                            <th  style="background-color: #329CD0;color: white; text-align: center">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($music as $mus){?>
                            <tr>
                                <td style=" text-align: center; font-weight: bold"><?= $mus[0]->song_name?></td>
                                <td style=" text-align: center; font-weight: bold"><?= $mus[0]->relevant_lyrics?></td>
                                <td style=" text-align: center; font-weight: bold"><?= $mus[0]->artist_name?></td>
                                <td style=" text-align: center; font-weight: bold"><?= $mus[0]->writer_name?></td>
                                <td style=" text-align: center; font-weight: bold"><?= $mus[0]->song_story?></td>
                                <td style=" text-align: center; font-weight: bold"><?= $mus[0]->release_date?></td>
                                <td style=" text-align: center; font-weight: bold"><?= $mus[0]->album?></td>
                                <td style=" text-align: center; font-weight: bold"><?= $mus[0]->media_url?></td>
                                <td  style=" text-align: center; font-weight: bold">
                                    <?php if(!empty($mus[2][0])){
                                        echo '<a href="/admin/look_file/'.$mus[2][0]->id.'-music">'.$mus[2][0]->name.'</a>';
                                    }
                                    ?>
                                </td>
                                <td style=" text-align: center; font-weight: bold">
                                    <?php foreach ($mus[1] as $tags){?>
                                        <p><?= $tags->tag_name?></p>
                                    <?php } ?>
                                </td>

                                <td  style=" text-align: center; font-weight: bold"><a href="/admin/edit-music/<?= $mus[0]->id?>-<?= $versusID?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                <td  style=" text-align: center; font-weight: bold"><a href="/admin/delete-music-admin/<?= $mus[0]->id?>-<?= $versusID?>"><i id="book_id" style="color:red;" class="fa fa-times" aria-hidden="true"></i></a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane" id="4">
                    <h2>Movie data</h2>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th  style="background-color: #329CD0;color: white; text-align: center">Movie name:</th>
                            <th  style="background-color: #329CD0;color: white; text-align: center">Description</th>
                            <th  style="background-color: #329CD0;color: white; text-align: center">Director name</th>
                            <th  style="background-color: #329CD0;color: white; text-align: center">Actors</th>
                            <th  style="background-color: #329CD0;color: white; text-align: center">Release date</th>
                            <th  style="background-color: #329CD0;color: white; text-align: center">Media url</th>
                            <th  style="background-color: #329CD0;color: white; text-align: center">Media File</th>
                            <th  style="background-color: #329CD0;color: white; text-align: center">Tags</th>
                            <th  style="background-color: #329CD0;color: white; text-align: center">Edit</th>
                            <th  style="background-color: #329CD0;color: white; text-align: center">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($movie as $mov){?>
                            <tr>
                                <td  style=" text-align: center; font-weight: bold"><?= $mov[0]->movie_name?></td>
                                <td  style=" text-align: center; font-weight: bold"><?= $mov[0]->description?></td>
                                <td style=" text-align: center; font-weight: bold"><?= $mov[0]->director?></td>
                                <td style=" text-align: center; font-weight: bold"><?= $mov[0]->actors?></td>
                                <td style=" text-align: center; font-weight: bold"><?= $mov[0]->release_date?></td>
                                <td  style=" text-align: center; font-weight: bold"><?= $mov[0]->movie_link?></td>
                                <td  style=" text-align: center; font-weight: bold">
                                    <?php if(!empty($mov[2][0])){
                                        echo '<a href="/admin/look_file/'.$mov[2][0]->id.'-movie">'.$mov[2][0]->name.'</a>';
                                    }
                                    ?>
                                </td>

                                <td style=" text-align: center; font-weight: bold">
                                    <?php foreach ($mov[1] as $tags){?>
                                        <p><?= $tags->tag_name?></p>
                                    <?php } ?>
                                </td>
                                <td  style=" text-align: center; font-weight: bold"><a href="/admin/edit-movie/<?= $mov[0]->id?>-<?=$versusID?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                <td  style=" text-align: center; font-weight: bold"><a href="/admin/delete-movie-admin/<?= $mov[0]->id?>-<?= $versusID?>"><i id="book_id" style="color:red;" class="fa fa-times" aria-hidden="true"></i></a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
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

    $('.fa-times').on('click', function (e) {
        swal("Good job!", "Deleted", "success");
    });
</script>

