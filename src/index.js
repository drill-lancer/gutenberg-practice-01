import { registerBlockType } from '@wordpress/blocks';
import {
	RichText,
	AlignmentToolbar,
	BlockControls,
	InnerBlocks,
} from '@wordpress/block-editor';
import { withSelect } from '@wordpress/data';
import ServerSideRender from '@wordpress/server-side-render';

const blockStyle = {
	backgroundColor: '#900',
	color: '#fff',
	padding: '20px',
};

registerBlockType( 'wyvern-blocks/test-01', {
	title: 'Example: Basic (esnext)',
	icon: 'universal-access-alt',
	category: 'layout',
	example: {},
	edit() {
		return (
			<div style={ blockStyle }>
				Hello World, step 1 (from the editor).
			</div>
		);
	},
	save() {
		return (
			<div style={ blockStyle }>
				Hello World, step 1 (from the frontend).
			</div>
		);
	},
} );

registerBlockType( 'wyvern-blocks/test-02', {
	title: 'Example: Stylesheets',
	icon: 'universal-access-alt',
	category: 'layout',
	example: {},
	edit( { className } ) {
		return (
			<p className={ className }>
				Hello World, step 2 (from the editor, in green).
			</p>
		);
	},
	save( { className } ) {
		return (
			<p className={ className }>
				Hello World, step 2 (from the frontend, in red).
			</p>
		);
	},
} );

registerBlockType( 'wyvern-blocks/test-03', {
	title: 'Example: Editable (esnext)',
	icon: 'universal-access-alt',
	category: 'layout',
	attributes: {
		content: {
			type: 'array',
			source: 'children',
			selector: 'p',
		},
	},
	example: {
		attributes: {
			content: 'Hello World',
		},
	},
	edit: ( props ) => {
		const {
			attributes: { content },
			setAttributes,
			className,
		} = props;
		const onChangeContent = ( newContent ) => {
			setAttributes( { content: newContent } );
		};
		return (
			<RichText
				tagName="p"
				className={ className }
				onChange={ onChangeContent }
				value={ content }
			/>
		);
	},
	save: ( props ) => {
		return (
			<RichText.Content tagName="p" value={ props.attributes.content } />
		);
	},
} );

registerBlockType( 'wyvern-blocks/test-04', {
	title: 'Example: Controls (esnext)',
	icon: 'universal-access-alt',
	category: 'layout',
	attributes: {
		content: {
			type: 'array',
			source: 'children',
			selector: 'p',
		},
		alignment: {
			type: 'string',
			default: 'none',
		},
	},
	example: {
		attributes: {
			content: 'Hello World',
			alignment: 'right',
		},
	},
	edit: ( props ) => {
		const {
			attributes: { content, alignment },
			className,
		} = props;
		const onChangeContent = ( newContent ) => {
			props.setAttributes( { content: newContent } );
		};
		const onChangeAlignment = ( newAlignment ) => {
			props.setAttributes( {
				alignment: newAlignment === undefined ? 'none' : newAlignment,
			} );
		};
		return (
			<div>
				{
					<BlockControls>
						<AlignmentToolbar
							value={ alignment }
							onChange={ onChangeAlignment }
						/>
					</BlockControls>
				}

				<RichText
					className={ className }
					style={ { textAlign: alignment, } }
					tagName="p"
					onChange={ onChangeContent }
					value={ content }
				/>
			</div>
		);
	},
	save: ( props ) => {
		return (
			<RichText.Content
				className={
					'wyvern-blocks-align-${props.attributes.alignment}'
				}
				tagName="p"
				value={ props.attributes.content }
			/>
		);
	},
} );

registerBlockType( 'wyvern-blocks/test-05', {
	title: 'Example: last post',
	icon: 'megaphone',
	category: 'widgets',

	edit: withSelect( ( select ) => {
		return {
			posts: select( 'core' ).getEntityRecords( 'postType', 'post' ),
		};
	} )( ( { posts, className } ) => {
		if ( ! posts ) {
			return 'Loading...';
		}

		if ( posts && posts.length === 0 ) {
			return 'No Posts';
		}

		const post = posts[ 0 ];

		return (
			<a className={ className } href={ post.link }>
				{ post.title.rendered }
			</a>
		);
	} ),
} );

registerBlockType( 'wyvern-blocks/test-06', {
	title: 'Example: last post 2',
	icon: 'megaphone',
	category: 'widgets',

	edit: ( props ) => {
		return (
			<ServerSideRender
				block="wyvern-blocks/test-06"
				attributes={ props.attributes }
			/>
		);
	},
} );

registerBlockType( 'wyvern-blocks/test-07', {
	title: 'Example: Inner Blocks',
	icon: 'megaphone',
	category: 'layout',

	edit: ( { className } ) => {
		return (
			<div className={ className }>
				<InnerBlocks />
			</div>
		);
	},

	save: ( { className } ) => {
		return (
			<div className={ className }>
				<InnerBlocks.content />
			</div>
		);
	},
} );
