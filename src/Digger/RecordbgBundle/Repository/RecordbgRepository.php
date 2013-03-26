<?php
namespace Digger\RecordbgBundle\Repository;

use Doctrine\ORM\EntityRepository;


class RecordbgRepository extends EntityRepository
{
    public function getObjectListQb($catId = 0)
    {
		$qb = $this->_em->createQueryBuilder();
        $qb->select('o,c,com, count(com.id) as com_num')
             //   ->addSelect($qb->expr()->count('com'))
            ->from('Digger\RecordbgBundle\Entity\Objects', 'o')
            ->leftJoin('o.cat', 'c')
            ->leftJoin('o.comments', "com")
            ->where('o.statcode = 1')
            ->andWhere('com.statcode = 1')
            ->groupBy('o.id')
            ->orderBy('o.id', 'DESC');
          
		if ($catId) {
			$qb->add('where', 'c.id = ?1')->setParameter(1, $catId);
		}
		
		return $qb;
    }
	
    public function getFullItemQuery($id)
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('o,c,com')
            ->from('Digger\RecordbgBundle\Entity\Objects', 'o')
            ->leftJoin('o.cat', 'c')
           	->leftJoin('o.comments', 'com')
            ->where('o.statcode = 1')
            ->add('where', 'o.id = ?1')->setParameter(1, $id);

         return $qb->getQuery();
    }
    
	public function doDump($qb)
	{
		$dql = $qb->getDQL();
		var_dump($dql);
		exit();
	}

    public function getActiveUsers()
    {
		$qb = $this->createQueryBuilder('u');
		$q = $qb->getQuery();
	
		return $q->execute();
    }

    public function getObejctCount()
    {
         //Create query builder for languages table
         $qb = $this->createQueryBuilder('l');
         //Add Count expression to query
         $qb->add('select', $qb->expr()->count('l'));
         //Get our query
         $q = $qb->getQuery();
         //Return number of items
         return $q->getSingleScalarResult();
     }
}

?>