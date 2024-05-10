<?php

// ---------------------------------------------------------------------------------------------------------------------
// Modul in TYPO3 tt_content registrieren
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
	array(
		'LLL:EXT:ps14_marker/Resources/Private/Language/locallang_tca.xlf:title',
		'ps14_marker',
		'ps14-module-marker'
	),
	'CType',
	'ps14_marker'
);

// ---------------------------------------------------------------------------------------------------------------------
// Modul TCA anpassen

// Felddefinitionen
$GLOBALS['TCA']['tt_content']['types']['ps14_marker']['showitem'] = \Ps14\Site\Service\TcaService::getShowitem(
	['general', 'appearance', 'language', 'access', 'categories', 'notes', 'extended'],
	[
		'general' => '--palette--;;general, --palette--;;headers, --palette--;;foundation_identifier, bodytext, image, tx_foundation_elements,'
	]
);

// Bodytext mit CKEditor rendern
$GLOBALS['TCA']['tt_content']['types']['ps14_marker']['columnsOverrides']['bodytext']['config'] = [
	'enableRichtext' => true,
	'richtextConfiguration' => 'ps14Default',
];

// Maximale Bildanzahl
$GLOBALS['TCA']['tt_content']['types']['ps14_marker']['columnsOverrides']['image']['config']['maxitems'] = 1;

// Crop-Varianten fuer Image-Feld
$GLOBALS['TCA']['tt_content']['types']['ps14_marker']['columnsOverrides']['image']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants'] = \Ps14\Site\Service\TcaService::getCropVariants(
	[
		'mobile' => [
			'allowedAspectRatios' => ['16_9', '4_3', 'NaN'],
			'selectedRatio' => '16_9'
		],
		'desktop' => [
			'allowedAspectRatios' => ['16_9', '4_3', 'NaN'],
			'selectedRatio' => '4_3'
		]
	]
);

// ---------------------------------------------------------------------------------------------------------------------
// Elements TCA anpassen

// Definition Record
$GLOBALS['TCA']['tt_content']['types']['ps14_marker']['columnsOverrides']['tx_foundation_elements']['config']['overrideChildTca'] = [
	'columns' => [
		'record_type' => [
			'config' => [
				'items' => [
					[
						'label' => 'LLL:EXT:ps14_marker/Resources/Private/Language/locallang_tca.xlf:elements.record-type.default',
						'value' => 'ps14_marker_default'
					],
				],
				'default' => 'ps14_marker_default'
			]
		],
		'description' => [
			'config' => [
				'richtextConfiguration' => 'ps14Default'
			]
		]
	],
	'types' => [
		'ps14_marker_default' => [
			'showitem' => \Ps14\Site\Service\TcaService::getShowitem(
				['general', 'appearance', 'access'],
				[
					'general' => '--palette--;;general, --palette--;;header, description,'
				],
				'tx_foundation_domain_model_elements'
			)
		],
	]
];