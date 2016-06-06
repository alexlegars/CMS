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



   public function insertAll()
    {
        $uploadimg = 'img/';
        $tempdir = $_FILES['image']['tmp_name'];
        move_uploaded_file($tempdir, $uploadimg . $_FILES['image']['name']);

        $sql ="
        INSERT INTO
        `page`
        (
        `title`,
        `h1`,
        `body`,
        `span_class`,
        `span_text`,
        `image`,
        `slug`
        )
        VALUES
        (
         :title,
         :h1,
         :body,
         :span_class,
         :span_text,
         :image,
         :slug)
         ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':title', $_POST['title']);
        $stmt->bindParam(':h1', $_POST['h1']);
        $stmt->bindParam(':body', $_POST['body']);
        $stmt->bindParam(':span_class', $_POST['span_class']);
        $stmt->bindParam(':span_text', $_POST['span_text']);
        $stmt->bindParam(':image', $_POST['image']); // pas bien
        $stmt->bindParam(':slug', $_POST['slug']);
        $stmt->execute();

    }

    public function delete()
    {
        $sql = "
      DELETE FROM
      `page`
      WHERE
      `id` = :id
      LIMIT 1
      ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();

    }

    public function modif(){

        $sql="
      UPDATE
      `page`
      SET
      `title` = :title,
      `h1` = :h1,
      `body` = :body,
      `span_class` = :span_class,
      `span_text` = :span_text,
      `image` = :image,
      `slug` = :slug
      WHERE id = :id
      LIMIT 1";
        $stmt= $this->PDO->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->bindValue(':title', $_POST['title']);
        $stmt->bindValue(':h1', $_POST['h1']);
        $stmt->bindValue(':body', $_POST['body']);
        $stmt->bindValue(':span_class', $_POST['span_class']);
        $stmt->bindValue(':span_text', $_POST['span_text']);
        $stmt->bindValue(':image', "img/".$_POST['image']);//Uniquement récupérable dans le bon repertoire aie pas bien
        $stmt->bindValue(':slug', $_POST['slug']);
        $stmt->execute();

    }

}