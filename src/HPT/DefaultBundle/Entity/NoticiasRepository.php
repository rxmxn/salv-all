<?php

namespace HPT\DefaultBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * NoticiasRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class NoticiasRepository extends EntityRepository
{
    public function FindUltimasNews($cantidad)
    {
        $em=$this->getEntityManager();
        $dql='SELECT n FROM HPTDefaultBundle:Noticias n ORDER BY n.fechaArticulo DESC ';
        $query=$em->createQuery($dql);
        $query->setMaxResults($cantidad);
        $entity=$query->getResult();
        return $entity;
    }

    public function FindAllCat()
    {
        $em=$this->getEntityManager();
        $dql='SELECT DISTINCT n.categoria FROM HPTDefaultBundle:Noticias n ORDER BY n.categoria DESC ';
        $query=$em->createQuery($dql);
        $entity=$query->getResult();
        return $entity;
    }

    public function FindCat($categoria)
    {
        $em=$this->getEntityManager();
        $dql='SELECT n FROM HPTDefaultBundle:Noticias n WHERE n.categoria= :categoria ORDER BY n.fechaArticulo DESC ';
        $query=$em->createQuery($dql);
        $query->setParameter('categoria',$categoria);
        $entity=$query->getResult();
        return $entity;

    }

    public function FindNombreNoticia($noticia)
    {
        $em=$this->getEntityManager();
        $query=$em->createQuery('SELECT n FROM HPTDefaultBundle:Noticias n WHERE n.nombreAutor= :nombreAutor');
        $query->setParameter('nombreAutor',$noticia->getNombreAutor());
        $entity=$query->getResult();
        return $entity;
    }
}
