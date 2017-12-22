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
	 * @return integer
	 */
	public function getId(): integer
	{
		return $this->id;
	}
}
