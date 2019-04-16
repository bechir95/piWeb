<?php

namespace ForumBundle\Repository;
use Doctrine\ORM\EntityRepository;

class DislikedRepository extends EntityRepository
{
    function findDislikedForumDQL($id){
        $query = $this->createQueryBuilder('m')
            ->where('m.forum = :id')
            ->setParameter('id',$id);
        return $query->getQuery()->getResult();

    }

    function findUserDislikedLikedForumDQL($id,$idForum){

        return $this->createQueryBuilder('m')
            ->where("m.user = :id")
            ->andWhere("m.forum = :idForum")

            ->setParameter('id', $id)
            ->setParameter('idForum', $idForum)
            ->getQuery()
            ->getResult();

    }
}