<?php include ROOT . '/views/layouts/header.php'; ?>
<?php if ($checkAuthor): ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-4">    
            <div class="row">
                <h4>Изменить текущую запись</h4>
                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <form action="#" method="post" enctype="multipart/form-data">

                    <label>Заголовок записи</label>
                    <input type="text" name="title" placeholder="" value="<?php echo $news['title']; ?>" class="input-group" style="width: 100%; margin-bottom: 20px">

                    <label>Краткое описание</label>
                    <textarea class="form-control" name="short_content" rows="3" style="margin-bottom: 20px"><?php echo $news['short_content']; ?></textarea>

                    <label>Текст записи</label>
                    <textarea class="form-control" name="content" rows="10" style="margin-bottom: 20px"><?php echo $news['content']; ?></textarea>
                    
                    <label>Изображение</label>
                    <input type="file" name="image" placeholder="" value="" style="margin-bottom: 20px">

                    <input type="submit" name="submit" class="btn btn-default text-right" value="Сохранить изменения">
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php include ROOT . '/views/layouts/footer.php'; ?>
