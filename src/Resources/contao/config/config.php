<?php
const CONTAO_INVENTAR_BUNDLE_VERSION = '0.1.0';

Contao\ArrayUtil::arrayInsert($GLOBALS['BE_MOD'], 0, [
	'contao-inventar-bundle' => [
		'inventar' => [
			'tables' => [
				'tl_inventar'
			]
		],
		'inventar_orte' => [
			'tables' => [
				'tl_inventar_orte'
			]
		],
		'inventar_gruppen' => [
			'tables' => [
				'tl_inventar_gruppen'
			]
		],
		'inventar_kostenstellen' => [
			'tables' => [
				'tl_inventar_kostenstellen'
			]
		],
		'inventar_kategorien' => [
			'tables' => [
				'tl_inventar_kategorien'
			]
		],
		'inventar_zustaende' => [
			'tables' => [
				'tl_inventar_zustaende'
			]
		],
	]
]);

if(Contao\System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest(Contao\System::getContainer()->get('request_stack')->getCurrentRequest() ?? Symfony\Component\HttpFoundation\Request::create('')))
{
	$objCombiner = new Contao\Combiner();
	$objCombiner->add('/bundles/contaoinventar/css/backend.css');
	$GLOBALS['TL_CSS']['inventar-backend-css'] = $objCombiner->getCombinedFile();
}
