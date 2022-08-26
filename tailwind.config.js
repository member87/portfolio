const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		"./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
		"./storage/framework/views/*.php",
		"./resources/views/**/*.blade.php",
		"./resources/js/**/*.vue",
	],
	theme: {
		extend: {
			fontFamily: {
				sans: ["Nunito", ...defaultTheme.fontFamily.sans],
			},
			fontSize: {
				"xxs": ".7rem"
			},
			colors: {
				"light-shade": "#F2F4F5",
				"light-accent": "#3C779A",
				"primary": "#3EC8D0",
				"dark-accent": "#5D547A",
				"dark-shade": "#181923",


				// Languages
				"PHP": "rgb(79, 93, 149)",
				"Vue": "rgb(65, 184, 131)",
				"Blade": "rgb(247, 82, 63)",
				"JavaScript": "rgb(241, 224, 90)",
				"CSS": "rgb(86, 61, 124)",
				"Python": "rgb(53, 114, 165)",
				"Lua": "#000080",
				"Shell": "#89e051",
				"GLSL": "#5686a5",
        "Rust": "rgb(222, 165, 132)"
			},
		},
	},
	safelist: [
		{
			pattern: /bg-(PHP|Vue|Blade|JavaScript|CSS|Python|Lua|Shell|GLSL)/,
		},
	],
	plugins: [require("@tailwindcss/forms"), require("@tailwindcss/typography")],
};
