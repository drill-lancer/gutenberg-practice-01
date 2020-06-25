import { registerBlockType } from '@wordpress/blocks';

const blockStyle = {
	backgroundColor: '#900',
	color: '#fff',
	padding: '20px',
};

registerBlockType(
	'wyvern-blocks/test-01', {
		title: 'Example: Basic (esnext)',
		icon: 'universal-access-alt',
		category: 'layout',
		example: {},
		edit() {
			return <div style={ blockStyle }>Hello World, step 1 (from the editor).</div>;
		},
		save() {
			return <div style={ blockStyle }>Hello World, step 1 (from the frontend).</div>;
		}
	}
);

registerBlockType(
	'wyvern-blocks/test-02', {
		title: 'Example: Stylesheets',
		icon: 'universal-access-alt',
		category: 'layout',
		example: {},
		edit({ className }) {
			return <p className={ className }>Hello World, step 2 (from the editor, in green).</p>;
		},
		save({ className }) {
			return <p className={ className }>Hello World, step 2 (from the frontend, in red).</p>;
		}
	}
);
