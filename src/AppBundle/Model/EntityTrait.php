<?php
namespace AppBundle\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entity trait
 */
Trait EntityTrait
{
	/**
	 * Id
	 *
	 * @var integer
	 *
	 * @ORM\Id
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * Gets its id
	 *
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}
}
