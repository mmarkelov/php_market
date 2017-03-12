<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row" id="empty">
            <style>
                .container #empty {
                	margin-top: 50px;
                        height: 500px;
                }
            </style>
            <h1>Кабинет пользователя</h1>
            
            <h3>Привет, <?php echo $user['name'];?>!</h3>
            
            <ul>
                <li><a href="/cabinet/edit">Редактировать данные</a></li>
                <li><a href="/cabinet/history">Список покупок</a></li>
                <li><a href="/blog/create/">Добавить запись в блог</a></li>
            </ul>
            
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>