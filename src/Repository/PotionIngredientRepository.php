<?php

namespace App\Repository;

use App\Entity\PotionIngredient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PotionIngredient>
 *
 * @method PotionIngredient|null find($id, $lockMode = null, $lockVersion = null)
 * @method PotionIngredient|null findOneBy(array $criteria, array $orderBy = null)
 * @method PotionIngredient[]    findAll()
 * @method PotionIngredient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PotionIngredientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PotionIngredient::class);
    }

    public function add(PotionIngredient $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PotionIngredient $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
