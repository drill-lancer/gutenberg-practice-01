import { registerBlockType } from '@wordpress/blocks';

registerBlockType(
	'wyvern-blocks/test-block',
	{
		title: 'Basic Example',
		icom: 'smiley',
		category: 'layout',
		edit: () => <div>Hola, mundo!</div>,
		save: () => <div>Hola, mundo!</div>
	}
);
