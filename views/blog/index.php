<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <?php if (!User::isGuest()): ?>
                <a href="/blog/create/">Добавить запись +</a>
            <?php endif; ?>
        </div>
        <div class="col-md-8 col-md-offset-4">
            <h2 class="page-header">Список записей</h2>
            <div class="article">
                <?php foreach ($latestNews as $news): ?>
                    <h3><a href="/blog/view/<?php echo $news['id']; ?>"><?php echo $news['title']; ?></a></h3>
                    <p class="lead">by <a href="/blog/author/<?php echo $news['author_name']; ?>"><?php echo $news['author_name']; ?></a></p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on time: <?php echo $news['date']; ?></p>
                    <hr>
                    <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                    <p><?php echo $news['short_content']; ?></p>
                    <a class="btn btn-primary" href="/blog/view/<?php echo $news['id']; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <hr>
                <?php endforeach; ?> 
            </div>
            <div class="col-md-4 col-md-offset-5">
                <div class="container">
                    <div class="row">
                        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                        <span class="sr-only">Loading...</span>
                        <div class="row">
                            <button class="btn btn-primary" id="more">Дальше</button>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>
