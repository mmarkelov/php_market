<?php

class BlogController {

    public function actionUpdate($id) {

        $news = Blog::getBlogItemById($id);
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        $checkAuthor = Blog::checkAuthor($news['author_name'], $user['name']);

        if (isset($_POST['submit'])) {
            // Получаем данные из формы
            $options['title'] = $_POST['title'];
            $options['short_content'] = $_POST['short_content'];
            $options['content'] = $_POST['content'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['title']) || empty($options['title'])) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {

                if (Blog::updateNewsById($id, $options)) {

                    // Если запись сохранена
                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {

                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
                    }
                    header("Location: /blog");
                }
            }
        }
        require_once(ROOT . '/views/blog/update.php');

        return true;
    }

    public function actionView($id) {

        $news = Blog::getBlogItemById($id);
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        $checkAuthor = Blog::checkAuthor($news['author_name'], $user['name']);

        require_once(ROOT . '/views/blog/view.php');

        return true;
    }

    public function actionIndex() {

        $latestNews = array();
        $latestNews = Blog::getBlogList(2);
        //$userId = User::checkLogged();
        
        require_once ROOT . '/views/blog/index.php';

        return true;
    }
    
    public function actionNewsAjax() {
        if (isset($_POST['startFrom'])) {
            $startFrom = $_POST['startFrom'];
            $newsList = Blog::getNewsListAjax($startFrom);
        }
        
        return true;
    } 

    public function actionCreate() {

        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем идентификатор пользователя из сессии
            $userId = User::checkLogged();

            // Получаем информацию о пользователе из БД
            $user = User::getUserById($userId);
            // Получаем данные из формы
            $options['title'] = $_POST['title'];
            $options['short_content'] = $_POST['short_content'];
            $options['content'] = $_POST['content'];
            $options['author_name'] = $user['name'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['title']) || empty($options['title'])) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {
                // Если ошибок нет
                $id = Blog::createNews($options);

                // Если запись добавлена
                if ($id) {
                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
                    }
                };

                // Перенаправляем пользователя на страницу управлениями товарами
                header("Location: /blog");
            }
        }

        require_once(ROOT . '/views/blog/create.php');

        return true;
    }
    
    public function actionDelete($id)
    {
        // Проверка доступа
        $news = Blog::getBlogItemById($id);
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        $checkAuthor = Blog::checkAuthor($news['author_name'], $user['name']);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем товар
            Blog::deleteNewsById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /blog");
        }

        // Подключаем вид
        require_once(ROOT . '/views/blog/delete.php');
        return true;
    }

    public function actionAuthor($name) {

        $News = Blog::getBlogNewsByName($name);

        require_once(ROOT . '/views/blog/author.php');

        return true;
    }

}
