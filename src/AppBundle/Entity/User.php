<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 *
 * @author  Sascha Schneider <schneider@redhotmagma.de>
 * @since   2016-06
 *
 * @ORM\Entity
 * @ORM\Table(name="user")
 *
 * @package AppBundle\Entity
 */
class User {

	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 *
	 * @var int $id
	 */
	private $id;

	/**
	 * @ORM\Column(type="string", length=25)
	 *
	 * @var string $username
	 */
	private $username;

	/**
	 * @ORM\Column(type="string", length=100)
	 *
	 * @var string $email
	 */
	private $email;

	/**
	 * @ORM\Column(type="string", length=50,nullable=true)
	 *
	 * @var string $firstName
	 */
	private $firstName;

	/**
	 * @ORM\Column(type="string", length=50,nullable=true)
	 *
	 * @var string $lastName
	 */
	private $lastName;

	/**
	 * @ORM\Column(type="date")
	 *
	 * @var \DateTime $dateOfBirth
	 */
	private $dateOfBirth;

	/**
	 * @ORM\Column(type="text",nullable=true)
	 *
	 * @var string $aboutMe
	 */
	private $aboutMe;



	public function __construct() {

		// @todo Set date to default date.
		$this->dateOfBirth = new \DateTime('0000-00-00');
	}



	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId() {

		return $this->id;
	}



	/**
	 * Set username
	 *
	 * @param string $username
	 *
	 * @return User
	 */
	public function setUsername( $username ) {

		$this->username = $username;

		return $this;
	}



	/**
	 * Get username
	 *
	 * @return string
	 */
	public function getUsername() {

		return $this->username;
	}



	/**
	 * Set email
	 *
	 * @param string $email
	 *
	 * @return User
	 */
	public function setEmail( $email ) {

		$this->email = $email;

		return $this;
	}



	/**
	 * Get email
	 *
	 * @return string
	 */
	public function getEmail() {

		return $this->email;
	}



	/**
	 * Set firstName
	 *
	 * @param string $firstName
	 *
	 * @return User
	 */
	public function setFirstName( $firstName ) {

		$this->firstName = $firstName;

		return $this;
	}



	/**
	 * Get firstName
	 *
	 * @return string
	 */
	public function getFirstName() {

		return $this->firstName;
	}



	/**
	 * Set lastName
	 *
	 * @param string $lastName
	 *
	 * @return User
	 */
	public function setLastName( $lastName ) {

		$this->lastName = $lastName;

		return $this;
	}



	/**
	 * Get lastName
	 *
	 * @return string
	 */
	public function getLastName() {

		return $this->lastName;
	}



	/**
	 * Set dateOfBirth
	 *
	 * @param \DateTime $dateOfBirth
	 *
	 * @return User
	 */
	public function setDateOfBirth( $dateOfBirth ) {

		$this->dateOfBirth = $dateOfBirth;

		return $this;
	}



	/**
	 * Get dateOfBirth
	 *
	 * @return \DateTime
	 */
	public function getDateOfBirth() {

		return $this->dateOfBirth;
	}



	/**
	 * Set aboutMe
	 *
	 * @param string $aboutMe
	 *
	 * @return User
	 */
	public function setAboutMe( $aboutMe ) {

		$this->aboutMe = $aboutMe;

		return $this;
	}



	/**
	 * Get aboutMe
	 *
	 * @return string
	 */
	public function getAboutMe() {

		return $this->aboutMe;
	}
}
