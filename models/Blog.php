<?php

class Blog {

    const SHOW_BY_DEFAULT = 6;

    /**
     * Returns single blog item with specified id
     * @param integer $id
     */
    public static function getBlogItemById($id) {
        $id = intval($id);

        if ($id) {

            $db = Db::getConnection();

            $result = $db->query('SELECT * FROM news WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $blogItem = $result->fetch();

            return $blogItem;
        }
    }

    /**
     * Returns an array of blog items
     */
    public static function getBlogList($count = self::SHOW_BY_DEFAULT) {

        $db = Db::getConnection();

        $blogList = array();

        $result = $db->query('SELECT id, title, date, short_content, author_name '
                . 'FROM news '
                . 'ORDER BY date DESC '
                . 'LIMIT ' . $count);

        $i = 0;
        while ($row = $result->fetch()) {
            $blogList[$i]['id'] = $row['id'];
            $blogList[$i]['title'] = $row['title'];
            $blogList[$i]['author_name'] = $row['author_name'];
            $blogList[$i]['date'] = $row['date'];
            $blogList[$i]['short_content'] = $row['short_content'];
            $i++;
        }

        return $blogList;
    }

    public static function createNews($options) {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO news '
                . '(title, short_content, content, author_name)'
                . 'VALUES '
                . '(:title, :short_content, :content, :author_name)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':short_content', $options['short_content'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
        $result->bindParam(':author_name', $options['author_name'], PDO::PARAM_STR);
        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }

    public static function getBlogNewsByName($name) {

        if ($name) {

            $db = Db::getConnection();

            $result = $db->query('SELECT * FROM news WHERE author_name="' . $name . '"');
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $blogList = array();

            $i = 0;
            while ($row = $result->fetch()) {
                $blogList[$i]['id'] = $row['id'];
                $blogList[$i]['title'] = $row['title'];
                $blogList[$i]['author_name'] = $row['author_name'];
                $blogList[$i]['date'] = $row['date'];
                $blogList[$i]['short_content'] = $row['short_content'];
                $i++;
            }

            return $blogList;
        }
    }

    public static function checkAuthor($authorName, $userName) {
        if ($authorName == $userName) {
            return true;
        }
        return false;
    }

    public static function updateNewsById($id, $options) {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE news
            SET 
                title = :title, 
                short_content = :short_content, 
                content = :content 
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':short_content', $options['short_content'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
        return $result->execute();
    }

    public static function deleteNewsById($id) {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM news WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function getNewsListAjax($startFrom, $quantity = 2) {

        $db = Db::getConnection();

        $blogList = array();

        $result = $db->query('SELECT id, title, date, short_content, author_name '
                . 'FROM news '
                . 'ORDER BY date DESC '
                . 'LIMIT ' . $startFrom . ', ' . $quantity);

        $i = 0;
        while ($row = $result->fetch()) {
            $blogList[$i]['id'] = $row['id'];
            $blogList[$i]['title'] = $row['title'];
            $blogList[$i]['author_name'] = $row['author_name'];
            $blogList[$i]['date'] = $row['date'];
            $blogList[$i]['short_content'] = $row['short_content'];
            $i++;
        }

        echo json_encode($blogList);
    }

}
