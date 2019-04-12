<?php

namespace FaqBundle\Repository;

use Doctrine\ORM\EntityRepository;


    class CommentRepository extends EntityRepository
{

    function findAllComment($id){
        $query=$this->getEntityManager()
            ->createQuery(
                "select a from FaqBundle:Comment comment WHERE comment.comment_id=:id"
            )->setParameter('comment',$id);
        return $query->getResult();
    }

}