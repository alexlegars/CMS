<?php
namespace Controller;

use Model\Pagerepository;

/**
 * Class PageController
 * @author Alexandre Le Gars <alexlegars@gmail.com>
 * @package Controller
 */
class PageController
{
   private $repository;
   
   public function __construct(\PDO $PDO)
   {
      $this->repository = new PageRepository($PDO);
   }

   public function ajoutAction()
   {
   }

   public function supprimerAction()
   {
   }

   public function modifierAction()
   {
   }

   public function detailsAction()
   {
   }

   public function listeAction()
   {
   }

   public function displayAction()
   {
//      $slug = $_GET['p'] ?? $_POST['p'] ?? 'teletubbies';
      if(isset($_GET['p'])){
         $slug = $_GET['p'];
      } else {
         $slug = 'teletubbies';
      }
      $page = $this->repository->getSlug($slug);
      $nav = $this->getNav();
      if(!$page){
         include "View/404.php";
         return;
      }
      include "View/page.php";
   }
   private function getNav()
   {
      //capture de l'output et placement dans l output buufer (ob)
      ob_start();
      include "View/nav.php";

      //return du output buffer et nettoyage du buffer
      return ob_get_clean();
   }
}