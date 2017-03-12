<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-4">    
            <div class="row">
                <h4>Добавить новую запись</h4>
                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <form action="#" method="post" enctype="multipart/form-data">

                    <label>Заголовок записи</label>
                    <input type="text" name="title" placeholder="" value="" class="input-group" style="width: 100%; margin-bottom: 20px">

                    <label>Краткое описание</label>
                    <textarea class="form-control" name="short_content" rows="3" style="margin-bottom: 20px"></textarea>

                    <label>Текст записи</label>
                    <textarea class="form-control" name="content" rows="10" style="margin-bottom: 20px"></textarea>
                    
                    <label>Изображение</label>
                    <input type="file" name="image" placeholder="" value="" style="margin-bottom: 20px">

                    <input type="submit" name="submit" class="btn btn-default text-right" value="Опубликовать запись">
                </form>
            </div>
        </div>
    </div>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>
