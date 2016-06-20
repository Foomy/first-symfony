<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ToggleType extends AbstractType {

	public function configureOptions( OptionsResolver $resolver ) {

		$resolver->setDefaults( array(
			'choiceon'  => 'ein',
			'choiceoff' => 'aus',
			'width' => 78,
			'height' => 34,
			'styleon' => 'primary',
			'styleoff' => 'default'
		) );
	}

	public function getParent() {

		return ChoiceType::class;
	}

	public function buildView( FormView $view, FormInterface $form, array $options ) {

		parent::buildView( $view, $form, $options );
		
		$view->vars = array_merge( $view->vars, $options );
	}
}