<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class UserType extends AbstractType {

	public function buildForm(FormBuilderInterface $builder, array $options) {

		$builder
			->add( 'username' )
			->add( 'email' )
			->add( 'firstName' )
			->add( 'lastName' )
			->add( 'dateOfBirth', null, ['widget' => 'choice'] )
			->add( 'aboutMe' )
			->add( 'isActive', ToggleType::class, array(
				'choiceon'  => 'aktiv',
				'choiceoff' => 'inaktiv',
				'height' => 26,
				'styleon' => 'success',
				'styleoff' => 'danger'
			) )
			->add( 'save', SubmitType::class, ['label' => 'Speichern'])
			->add( 'cancel', ButtonType::class, ['label' => 'Abbrechen']);
	}
}