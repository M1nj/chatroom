<?php
    ini_set("display_errors", 1);
    include("db.php");
    $title="Movies !";
    $search = $_GET['the_search'];

    $sql = "SELECT * FROM movie_simple
    WHERE actors LIKE :search OR title LIKE :search OR directors LIKE :search
    LIMIT 50";

$stmt = $dbh->prepare($sql);
$stmt -> execute([":search"=>"%$search%"]);
$movies = $stmt->fetchAll();
?> 
<?php include("top.php"); ?>
<title><?php echo $title; ?></title>


<body>
<?php
include 'layout/header.php';
?>

<div class="posters">
<?php
    foreach($movies as $movie){ ?>

        <a class="poster" href="detail.php?id=<?php echo $movie['id']; ?>">
            <img src="posters/<?php echo $movie["imdbId"]; ?>.jpg " alt="">
        </a>

    <?php } ?>
</div>

</body>
<?php include 'layout/footer.php';?>
</html>