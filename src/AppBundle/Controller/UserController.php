<?php


namespace AppBundle\Controller;

use AppBundle\Entity\User;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller {

	public function listAction() {

		$users = $this->getDoctrine()->getRepository( 'AppBundle:User' )->findAll();

		return $this->render(
			'user/list.twig',
			[
				'title' => 'Userlist',
				'users' => $users
			]
		);
	}



	public function editAction($userId) {

		if ( (int) $userId <= 0 ) {
			// @todo Show message and redirect to home.
		}

		$user = $this->getDoctrine()->getRepository( 'AppBundle:User' )->find( $userId );

		$form = $this->createFormBuilder($user)
			->add('username', TextType::class)
			->add('email', TextType::class)
			->add('firstName', TextType::class)
			->add('lastName', TextType::class)
			->add('dateOfBirth', DateType::class)
			->add('aboutMe', TextType::class)
			->add('save', SubmitType::class, array(
				'label' => 'Speichern'
			))
			->getForm();

		return $this->render(
			'user/edit.twig', [
				'user' => $user,
				'form' => $form->createView(),
			]
		);
	}



	public function addAction() {

		return $this->render(
			'user/add.twig'
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