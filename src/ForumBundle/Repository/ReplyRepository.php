<?php

namespace ForumBundle\Repository;
use Doctrine\ORM\EntityRepository;

class ReplyRepository extends EntityRepository
{
    function findForumDQL($id){
            $query = $this->createQueryBuilder('m')
                ->where('m.forum = :id')
                ->setParameter('id',$id);
            return $query->getQuery()->getResult();

    }
}
