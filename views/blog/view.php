<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <?php if ($checkAuthor): ?>
            <a href="/blog/update/<?php echo $news['id']; ?>" >Изменить текущую запись</a>
                <br>
                <a href="/blog/delete/<?php echo $news['id']; ?>">Удалить текущую запись</a>
            <?php endif; ?>
        </div>
        <div class="col-md-8 col-md-offset-4">
            <h2><?php echo $news['title']; ?></h2>
            <p class="lead">by <?php echo $news['author_name']; ?></p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on time: <?php echo $news['date']; ?></p>
            <hr>
            <img class="img-responsive" src="http://placehold.it/900x300" alt="">
            <hr>
            <p class="lead"><?php echo $news['short_content']; ?></p>
            <p><?php echo $news['content']; ?></p>
            <a class="btn btn-primary" href="/blog/"><i class="fa fa-arrow-left"></i> К списку новостей</a>
        </div>
    </div>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>