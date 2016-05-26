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

    public function getAll()
    {
        $sql = "
        SELECT
            `title`,
            `slug`
        FROM
            `page`
            ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $data = [];
        while($row = $stmt->fetchObject()){
            $data[]= $row;
        }
        return $data;
    }
}