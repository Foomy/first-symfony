<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Validator\Constraints as Assert;

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
class User extends Entity
	implements AdvancedUserInterface, \Serializable {

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
	 * @Assert\NotBlank()
	 *
	 * @var string $username
	 */
	private $username;


	/**
	 * @ORM\Column(type="string", length=100,nullable=false)
	 *
	 * @Assert\NotBlank()
	 *
	 * @var string $password
	 */
	private $password;

	/**
	 * @ORM\Column(type="string", length=100)
	 *
	 * @Assert\NotBlank()
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
	 * @Assert\Type("\DateTime")
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

	/**
	 * @ORM\Column(type="boolean",nullable=false)
	 * @var bool $isActive
	 */
	private $isActive;



	public function __construct() {

		$this->isActive    = true;
		$this->dateOfBirth = new \DateTime( self::DATE_DEFAULT );
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



	/**
	 * Set isConfirmed
	 *
	 * @param bool $isConfirmed
	 *
	 * @return User
	 */
	public function setIsConfirmed( $isConfirmed ) {

		$this->isConfirmed = $isConfirmed;

		return $this;
	}



	/**
	 * Get isConfirmed
	 *
	 * @return bool
	 */
	public function getIsConfirmed() {

		return $this->isConfirmed;
	}



	/**
	 * Set hash
	 *
	 * @param string $hash
	 *
	 * @return User
	 */
	public function setHash( $hash ) {

		$this->hash = $hash;

		return $this;
	}



	/**
	 * Get hash
	 *
	 * @return string
	 */
	public function getHash() {

		return $this->hash;
	}



	/**
	 * Set password
	 *
	 * @param string $password
	 *
	 * @return User
	 */
	public function setPassword( $password ) {

		$this->password = $password;

		return $this;
	}



	/**
	 * Get password
	 *
	 * @return string
	 */
	public function getPassword() {

		return $this->password;
	}



	/**
	 * Set isActive
	 *
	 * @param boolean $isActive
	 *
	 * @return User
	 */
	public function setIsActive( $isActive ) {

		$this->isActive = $isActive;

		return $this;
	}



	/**
	 * Get isActive
	 *
	 * @return boolean
	 */
	public function getIsActive() {

		return $this->isActive;
	}



	/**
	 * Since this app uses bcrypt to hash the passwords this method is not
	 * in use and therefore return null.
	 *
	 * @author Sascha Schneider <schneider@redhotmagma.de>
	 * @since  2016-06
	 *
	 * @return null
	 */
	public function getSalt() {

		return null;
	}



	public function getRoles() {

		return array('ROLE_USER');
	}



	public function eraseCredentials() {
	}



	public function isAccountNonExpired() {

		return true;
	}



	public function isAccountNonLocked() {

		return true;
	}



	public function isCredentialsNonExpired() {

		return true;
	}



	public function isEnabled() {

		return $this->isActive;
	}



	public function serialize() {

		return serialize( array(
			$this->id,
			$this->email,
			$this->password,
			$this->isActive
		) );
	}



	public function unserialize( $serialized ) {

		list(
			$this->id,
			$this->email,
			$this->password,
			$this->isActive
			) = unserialize( $serialized );
	}
}
