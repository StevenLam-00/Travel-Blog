<?php
include("path.php");
include(ROOT_PATH . "/app/controllers/usaccomms.php");

$posts = array();
$postsTitle = 'United States\'s Accommodations';

if (isset($_GET['p_id'])) {
    $posts = getUSAccommPostsByStateId($_GET['p_id']);
    $postsTitle = "You searched for posts under '" . $_GET['name'] . "'";
} else if (isset($_POST['search-term'])) {
    $posts = searchUSAccommPosts($_POST['search-term']);
    $postsTitle = "You searched for '" . $_POST['search-term'] . "'";
} else {
    $posts = getPublishedUSAccommPosts();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

    <!-- Custom Styling -->
    <link rel="stylesheet" href="assets/css/style.css">

    <title>US Accommodation</title>
</head>

<body>

    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
    <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Content -->
        <div class="content clearfix">
            <!-- Main Content -->
            <div class="main-content">
                <h1 class="recent-post-title"><?php echo $postsTitle ?></h1>

                <?php foreach ($posts as $post) : ?>
                    <div class="post clearfix">
                        <img src="<?php echo BASE_URL . '/assets/images/' . $post['image']; ?>" alt="" class="post-image">
                        <div class="post-preview">
                            <h2><a href="singleUSAccomm.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h2>
                            <i class="far fa-user"> <?php echo $post['username']; ?></i>
                            &nbsp;
                            <i class="far fa-calendar"> <?php echo date('F j, Y', strtotime($post['created_at'])); ?></i>
                            <p class="preview-text">
                                <?php echo html_entity_decode(substr($post['body'], 0, 150) . '...'); ?>
                            </p>
                            <a href="singleUSAccomm.php?id=<?php echo $post['id']; ?>" class="btn read-more">Read More</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- // Main Content -->

            <!-- Sidebar -->
            <div class="sidebar">
                <div class="section search">
                    <h2 class="section-title">Search</h2>
                    <form action="usAccomm.php" method="post">
                        <input type="text" name="search-term" class="text-input" placeholder="Search...">
                    </form>
                </div>

                <div class="section topics">
                    <h2 class="section-title">States</h2>
                    <ul>
                        <?php foreach ($states as $key => $state) : ?>
                            <li><a href="<?php echo BASE_URL . '/usAccomm.php?p_id=' . $state['id'] . '&name=' . $state['name'] ?>"><?php echo $state['name']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <!-- // Sidebar -->
        </div>
        <!-- // Content -->
    </div>
    <!-- // Page Wrapper -->

    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Slick Carousel -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <!-- Custom Script -->
    <script src="assets/js/scripts.js"></script>

</body>