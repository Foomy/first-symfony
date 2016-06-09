<?php


namespace AppBundle\Controller;


use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller {

	public function listAction() {

		$users = [
			[
				'id' => 1,
				'username' => 'SirFoomy',
				'email'    => 'schneider@redhotmagma.de',
				'firstName' => 'Sascha',
				'lastName' => 'Schneider'
			]
		];



		return $this->render(
			'user/list.twig',
			[
				'title' => 'Userlist',
				'users' => $users
			]
		);
	}



	public function addAction() {

		return $this->render(
			'user/form.twig'
		);
	}



	public function createAction() {

		$user = new User();
		$user->setUsername( 'SirFoomy' );
		$user->setFirstName( 'Sascha' );
		$user->setLastName( 'Schneider' );
		$user->setEmail( 'sir.foomy@googlemail.com' );

		$em = $this->getDoctrine()->getManager();
		$em->persist( $user );
		$em->flush();

		return new Response( 'Saved new user with id ' . $user->getId() );
	}

}