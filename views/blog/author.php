<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-4">
            <h2 class="page-header">Список записей, опубликованных пользователем: <?php echo $name; ?></h2>
            <?php foreach ($News as $news): ?>
                <h3><a href="/blog/view/<?php echo $news['id']; ?>"><?php echo $news['title']; ?></a></h3>
                <p class="lead">by <a href="/blog/author/<?php echo $news['author_name']; ?>"><?php echo $news['author_name']; ?></a></p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on time: <?php echo $news['date']; ?></p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <p><?php echo $news['short_content']; ?></p>
                <a class="btn btn-primary" href="/blog/view/<?php echo $news['id']; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
            <?php endforeach; ?> 
            <a class="btn btn-primary" href="/blog/"><i class="fa fa-arrow-left"></i> К списку новостей</a>
        </div>
    </div>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>

