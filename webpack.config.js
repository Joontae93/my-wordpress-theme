/**
 * External Dependencies
 */
const path = require('path');
const THEME_PATH = `wp-content/themes/mytheme`;
/**
 * WordPress Dependencies
 */
const defaultConfig = require('@wordpress/scripts/config/webpack.config.js');

module.exports = {
	...defaultConfig,
	...{
		entry: {
			singles: path.resolve(
				process.cwd(),
				`${THEME_PATH}/src/singles`,
				'post.js',
			),
			global: path.resolve(process.cwd(), `${THEME_PATH}/src`, 'index.js'),
		},
	},
};
