<?php


namespace App\Repository;

use App\Entity\Author;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class AuthorRepository extends BaseRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Author::class);
    }

    /**
     * Create author
     *
     * @param Author $author
     * @return Author
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function create(Author $author): Author{
        $author->setActive(1);
        $author->setCreatedAt(new \DateTime());

        $this->persistDatabase($author);

        return $author;
    }

    /**
     * Update author
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function update() {
        $this->getEntityManager()->flush();
    }

    /**
     * Remove author
     *
     * @param Author $author
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Author $author): void {
        $em = $this->getEntityManager();
        $em->remove($author);
        $em->flush();
    }
}