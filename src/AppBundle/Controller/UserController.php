<?php


namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\Type\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller {

	public function listAction() {

		$users = $this->getDoctrine()->getRepository( 'AppBundle:User' )->findAll();

		return $this->render(
			'user/list.html.twig',
			[
				'title' => 'Users',
				'users' => $users
			]
		);
	}



	public function loginAction() {

	}



	public function logoutAction() {

	}



	public function registerAction( Request $request ) {

		$form = $this->createForm( UserType::class, new User() );
		$form->handleRequest( $request );

		if( $form->isSubmitted() && $form->isValid() ) {
			$user = $form->getData();

			$em = $this->getDoctrine()->getManager();
			$em->persist( $user );
			$em->flush();

			// @todo Show success message
			return $this->redirectToRoute( 'users' );
		}

		return $this->render(
			'user/edit.html.twig', [
				'title' => 'User Registration',
				'form'  => $form->createView(),
			]
		);
	}



	public function addAction( Request $request ) {

		$form = $this->createForm( UserType::class, new User() );
		$form->handleRequest( $request );

		if( $form->isSubmitted() && $form->isValid() ) {
			$user = $form->getData();

			$em = $this->getDoctrine()->getManager();
			$em->persist( $user );
			$em->flush();

			// @todo Show success message
			return $this->redirectToRoute( 'users' );
		}

		return $this->render(
			'user/edit.html.twig', [
				'title' => 'Add User',
				'form'  => $form->createView(),
			]
		);
	}



	public function editAction( $userId, Request $request ) {

		if( (int)$userId <= 0 ) {
			// @todo Show invalid argument error message
			return $this->redirectToRoute( 'users' );
		}

		$user = $this->getDoctrine()->getRepository( 'AppBundle:User' )->find( $userId );

		$form = $this->createForm( UserType::class, $user );
		$form->handleRequest( $request );

		if( $form->isSubmitted() && $form->isValid() ) {
			$user = $form->getData();

			$em = $this->getDoctrine()->getManager();
			$em->persist( $user );
			$em->flush();

			// @todo Show success message
			return $this->redirectToRoute( 'users' );
		}

		return $this->render(
			'user/edit.html.twig', [
				'title'    => 'Edit User',
				'user'     => $user,
				'form'     => $form->createView(),
				'editMode' => true
			]
		);
	}



	public function deleteAction( $userId, Request $request ) {

		if( !$request->isXmlHttpRequest() ) {
			return $this->redirectToRoute( 'users' );
		}

		if( (int)$userId <= 0 ) {
			return new JsonResponse( 'Invalid argument error: ' . $userId, 500 );
		}

		$user = $this->getDoctrine()->getRepository( 'AppBundle:User' )->find( $userId );

		$em = $this->getDoctrine()->getManager();
		$em->remove( $user );
		$em->flush();

		return new JsonResponse( array(
			'msg' => 'User with ID »' . $userId . '« deleted.'
		) );
	}
}