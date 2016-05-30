<?php
namespace Model;

/**
 * Class Pagerepository
 * @author Alexandre Le Gars <alexlegars@gmail.com>
 * @package Model
 */
class PageRepository
{

    /**
     * @var \PDO
     */
    private $PDO;

    public function __construct(\PDO $PDO)
    {
        $this->PDO = $PDO;
    }

    /**
     * @param int $slug
     */
    public function getSlug($slug)
    {
        $sql = "
        SELECT 
          `id`, 
          `slug`,
          `h1`,
          `image`,
          `span_class`,
          `span_text`,
          `iframe`,
          `body`, 
          `title`
        FROM 
          `page` 
        WHERE 
          `slug` = :slug
        ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':slug', $slug);
        $stmt->execute();
        return $stmt->fetchObject();
    }

    /**
     * @return array liste des slugs et titles de toutes les pages
     */
    public function getAll()
    {
        $sql = "
        SELECT
          `id`,
          `slug`,
          `title`
        FROM
          `page`
        ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    public function putAll()
    {
        $uploadimg = 'img/';
        $tempdir = $_FILES['image']['tmp_name'];
        move_uploaded_file($tempdir, $uploadimg . $_FILES['image']['name']);

        $sql = "INSERT INTO
        `page`
        (
            `slug`,
            `h1`,
            `span_text`,
            `body`,
            `title`,
            `image`,
        )
        VALUES (
            :slug,
            :h1,
            :span_text,
            :body,
            :title,
            :image,
        )
        ";
        $stmt = $this->PDO->prepare($sql);

        $stmt->bindValue(':slug', $_POST["slug"]);
        $stmt->bindValue(':h1', $_POST["h1"]);
        $stmt->bindValue(':span_text', $_POST["span_text"]);
        $stmt->bindValue(':body', $_POST["body"]);
        $stmt->bindValue(':title', $_POST["title"]);
        $stmt->bindValue(':image', $_FILES['image']['name']);

        $stmt->execute();
        return $this->PDO->lastInsertId();
    }
}