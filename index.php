<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>News - Canyoupwn.me</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">
    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img width="10%" src="img/Logo.png" alt="">
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="news">
        <div class="container-fluid" style="margin-right: 25px; margin-left: 25px;">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>News</h3>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
<table class="table table-hover">
    <thead>
      <th>Title</th>
      <th>Cons</th>
    </thead>
    <tbody>
<?php
$db = new SQLite3('feed.db');
$start=0;
$limit=20;

if(isset($_GET['id']))
{
    $gelen = intval($_GET['id']);
    if(is_integer($gelen)){
        $id=$_GET['id'];
        $start=($id-1)*$limit;
    }
}

$query=$db->query("select * from feed LIMIT $start, $limit");
while($row = $query->fetchArray())
{
echo '<tr><td><a href="'.$row["url"].'" target="_blank"><b>'.$row["title"].'</b></a></td><td>'.$row["cons"].'</td></tr>';
}
echo "</tbody></table>";
$kayitlar = $db->query("SELECT COUNT(*) as count FROM feed");
$kayit = $kayitlar->fetchArray();
$numRows = $kayit['count'];
$total=ceil($numRows/$limit);
print('<div class="row"><div class="col-sm-12" align="center"><nav><ul class="pagination ">');

if($id>1)
{
 echo "<li><a href='?id=".($id-1)."' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a></li>";
}


for($i=1;$i<=$total;$i++)
{
 echo "<li><a href='?id=".$i."'>".$i."</a></li>"; 
}
if($id!=$total)
{
 echo "<li><a href='?id=".($id+1)."' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>";
}
?>

                      </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                    </div>
                    <div class="footer-col col-md-4">
                        <h3></h3>
                        <ul class="list-inline">
                            <li>
                                <a href="https://twitter.com/canyoupwnme" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/canyoupwnme" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https://plus.google.com/u/0/109441897587100558849" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/channel/UCbW7dDhzbQwAe5YvB01NkbQ" class="btn-social btn-outline"><i class="fa fa-fw fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; <a href="https://canyoupwn.me/">Canyoupwn.me</a> 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>

</body>

</html>
