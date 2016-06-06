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


    public function findById($id)
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
          `id` = :id
        ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id', $id);
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

        $sql ="
        INSERT INTO
        `page`
        (id,
        title,
        h1,
        body,
        span_class,
        span_text,
        img,
        slug)
        VALUES
        (null,
         :title,
         :h1,
         :body,
         :span_class,
         :span_text,
         :img,
         :slug)
         ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':title', $_POST['title']);
        $stmt->bindParam(':h1', $_POST['h1']);
        $stmt->bindParam(':body', $_POST['body']);
        $stmt->bindParam(':span_class', $_POST['span_class']);
        $stmt->bindParam(':span_text', $_POST['span_text']);
        $stmt->bindParam(':img', $_POST['img']);
        $stmt->bindParam(':slug', $_POST['slug']);
        $stmt->execute();
        header('Location: index.php?a=lister');
    }

}