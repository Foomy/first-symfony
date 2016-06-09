<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends Controller {

	/**
	 * @author Sascha Schneider <schneider@redhotmagma.de>
	 * @since  2016-06
	 *
	 * @return Response
	 */
	public function numberAction() {

		$number = mt_rand( 0, 100 );

		return new Response( '<!doctype html><html><head><title>lucky number</title></head><body>Lucky Number: ' . $number . '</body></html>' );
	}



	/**
	 * @author Sascha Schneider <schneider@redhotmagma.de>
	 * @since  2016-06
	 *
	 * @return JsonResponse
	 */
	public function numberJsonAction() {

		$number = array(
			'lucky_number' => mt_rand( 0, 100 )
		);

		return new JsonResponse( $number );
	}



	/**
	 * @author Sascha Schneider <schneider@redhotmagma.de>
	 * @since  2016-06
	 *
	 * @param $count
	 * @return Response
	 */
	public function numberListAction( $count ) {

		$numbers = [];
		for( $i = 0; $i < $count; $i++ ) {
			$numbers[] = mt_rand( 0, 100 );
		}

		$numberList = implode( ',', $numbers );

		return $this->render(
			'lucky/number-list.twig',
			['luckyNumberList' => $numberList]
		);
	}
}