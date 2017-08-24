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
                    <li><a href="/admin/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>


    <h3 style="margin-left: 10px;">Books List </h3>

    <div class="row" style="margin-left: 0px;">
        <div class="col-xs-10">
            <div class="form-group">
                <select id="bookSelect" class="selectpicker form-control"  data-live-search="true">
                    <?php foreach ($books as $eachBook){ ?>
                        <option data-book="<?= $eachBook->id ?>"><?= $eachBook->book_name ?></option>
                    <?php  } ?>
                </select>
            </div>
        </div>
        <button id="selectAllInBookButton" type="button" class="btn btn-success" >Select all</button>
    </div>

    <div class="row" style="margin-left: 0px;">
        <div class="col-xs-10">
            <div class="form-group">
                <select id="chapterSelect" class="selectpicker form-control"  data-live-search="true" multiple data-actions-box="true">
                </select>
            </div>
        </div>
        <button id="selectAllInChapterButton" type="button" class="btn btn-success" style="display: none;">Select all</button>
    </div>



</div>
<div id="preloader" class="loader loader-default"></div>
<div style="display: none;" id="formVerse">
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
        <button id="submitMultiplyVerses" style="margin-bottom: 20px; float: right;" class="btn btn-success" type="button">Next</button>
        <button style="margin-bottom: 20px; float: right; margin-right: 10px" class="btn btn-warning" type="button" id="saveVerseIdButton">Save verses</button>
    </form>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="/js/metisMenu.min.js"></script>
<script src="/dist/js/bootstrap-select.js"></script>

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

