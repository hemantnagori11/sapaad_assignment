/**
 * External dependencies
 */
import { __ } from '@wordpress/i18n';
import { Icon, cart } from '@woocommerce/icons';
import { registerExperimentalBlockType } from '@woocommerce/block-settings';

/**
 * Internal dependencies
 */
import edit, { Save as save } from './edit';
import { blockName } from './attributes';
import './inner-blocks';

const settings = {
	apiVersion: 2,
	title: __( 'Mini Cart Contents', 'woo-gutenberg-products-block' ),
	icon: {
		src: (
			<Icon
				srcElement={ cart }
				className="wc-block-editor-components-block-icon"
			/>
		),
	},
	category: 'woocommerce',
	keywords: [ __( 'WooCommerce', 'woo-gutenberg-products-block' ) ],
	description: __(
		'Display a mini cart widget.',
		'woo-gutenberg-products-block'
	),
	supports: {
		align: false,
		html: false,
		multiple: false,
		reusable: false,
		inserter: false,
		__experimentalExposeControlsToChildren: true,
		color: {
			text: false,
		},
	},
	attributes: {
		isPreview: {
			type: 'boolean',
			default: false,
			save: false,
		},
		lock: {
			type: 'object',
			default: {
				remove: true,
				move: true,
			},
		},
	},
	example: {
		attributes: {
			isPreview: true,
		},
	},
	edit,
	save,
};

registerExperimentalBlockType( blockName, settings );
