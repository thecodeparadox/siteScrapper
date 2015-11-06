<?php
/**
 * Created by PhpStorm.
 * User: abdullah
 * Date: 11/5/15
 * Time: 8:09 PM
 */

require_once dirname(__FILE__) . '/config/bootstrap.php';

use SiteScrapper\SiteScrapper;

$craiglistJobs = [];
<<<<<<< HEAD
$area = 'albany';
$category = 'jjj';
$search = '';

if ( isset($_POST) && isset($_POST['area']) && isset($_POST['category']) && isset($_POST['search']) ) {
    $area = $_POST['area'];
    $category = $_POST['category'];
    $search = $_POST['search'];

    $craiglistJobs = SiteScrapper::craigslistJobs();
}



?>

=======
$area = '';
$category = 'jjj';
$search = '';
$show_form = false;

if ( isset($_POST) && !empty($_POST['area']) && !empty($_POST['category']) && !empty($_POST['search']) ) {
    $area = $_POST['area'];
    $category = $_POST['category'];
    $search = $_POST['search'];
	$show_form = true;
    $craiglistJobs = SiteScrapper::craigslistJobs();
}
?>
>>>>>>> master
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SiteScrapping</title>

        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/font-awesome.min.css" rel="stylesheet">
<<<<<<< HEAD
=======
        <link href="assets/css/chosen.min.css" rel="stylesheet">
        <link href="assets/css/site.css" rel="stylesheet">
>>>>>>> master
    </head>
    <body>
        <div class="container">

            <div class="header clearfix">
                <h3 class="text-muted">Craiglist Scrapping</h3>
                <hr>
            </div>

<<<<<<< HEAD
            <div class="jumbotron">
                <form class="form-horizontal" method="post" action="">
                    <div class="form-group">
                        <label for="areas">Area</label>
                        <select name="area" class="form-control" id="areas" value="<?= $area ?>">
                            <?php echo file_get_contents(TMP . '/jones.txt'); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="categories">Category</label>
                        <select name="category" class="form-control" id="categories" value="<?= $category ?>">
                            <?php echo file_get_contents(TMP . '/categories.txt'); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="search">Topic</label>
                        <input type="text" class="form-control" id="search" name="search" value="<?= $search ?>">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Find</button>
                    </div>
                </form>
=======
            <div class="well">
				<form class="form-horizontal" method="post" action="" id="scrapping-search">
					<fieldset>
						<legend class="toggle">Search</legend>
						<div class="form-group">
							<label for="areas" class="col-sm-2">Area</label>
							<div class="col-sm-10">
								<select name="area" class="form-control chosen" id="areas" value="<?= $area ?>">
									<?= file_get_contents(TMP . '/locations.craiglist.txt'); ?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="categories" class="col-sm-2">Category</label>
							<div class="col-sm-10">
								<select name="category" class="form-control chosen" id="categories" value="<?= $category ?>">
									<?= file_get_contents(TMP . '/categories.txt'); ?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="search" class="col-sm-2">Topic</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="search" name="search" value="<?= $search ?>">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-success search-btn">Search <i class="fa fa-search	"></i></button>
							</div>
						</div>
					</fieldset>
				</form>
>>>>>>> master
            </div>


            <div class="search-result">
                <?php if( empty($craiglistJobs) ): ?>
                    <div class="alert-danger alert">No Results found.</div>
                <?php else: ?>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?= count($craiglistJobs) . ' results found.' ?></h3>
                        </div>
                        <div class="panel-body">
                            <table class="table fa-table-striped">
                                <thead>
                                <tr>
                                    <th>Links</th>
                                    <th>Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($craiglistJobs as $job): ?>
                                    <tr>
<<<<<<< HEAD
                                        <td><a href="<?php echo $job['href']; ?>"><?php echo $job['text']; ?></a></td>
                                        <td><?php echo $job['datetime']; ?></td>
=======
                                        <td><a href="<?= $job['href']; ?>"><?php echo $job['text']; ?></a></td>
                                        <td><?= $job['datetime']; ?></td>
>>>>>>> master
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <script src="assets/js/jquery-1.11.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
<<<<<<< HEAD
=======
    <script src="assets/js/chosen.jquery.min.js"></script>
    <script src="assets/js/site.js"></script>
>>>>>>> master

    </body>
</html>

<!-- //*[@id="searchform"]/div[2]/div[3]/p[2] -->

<!--
<p class="row" data-pid="5267273286">
    <a href="/web/5267273286.html" class="i" data-ids="0:00r0r_5HLkSOusKpV">
        <img alt="" class="thumb" src="http://images.craigslist.org/00r0r_5HLkSOusKpV_50x50c.jpg">
    </a>
    <span class="txt">
        <span class="star" title="save this post in your favorites list"></span>
        <span class="pl">
            <time datetime="2015-10-14 10:23" title="Wed 14 Oct 10:23:23 AM">Oct 14</time>
            <a href="/web/5267273286.html" data-id="5267273286" class="hdrlnk">Entry Level Web Developer</a>
        </span>
        <span class="l2">
            <span class="pnr">
                <small> (Watervliet)</small>
                <span class="px">
                    <span class="p"> pic</span>
                </span>
            </span>
        </span>
        <span class="js-only banish-unbanish no-mobile">[
            <a class="banish" title="hide" data-pid="5267273286">x</a>
            <a class="unbanish linklike" title="unhide" data-pid="5267273286">undo</a>]
        </span>
    </span>
</p>
-->



