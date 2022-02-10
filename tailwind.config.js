const defaultTheme = require('tailwindcss/defaultTheme');
const themeColors = require('tailwindcss/colors');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: [...defaultTheme.fontFamily.sans],
            },
            colors: {
                ...themeColors,
                primary: {
                    lightest: themeColors.blue[100],
                    lighter: themeColors.blue[200],
                    light: themeColors.blue[300],
                    DEFAULT: '#01AEEF',
                    // DEFAULT: '#2ebbbb',
                    dark: themeColors.blue[700],
                    darker: themeColors.blue[800],
                    darkest: themeColors.blue[900],
                },
                secondary: {
                    lightest: themeColors.red[100],
                    lighter: themeColors.red[200],
                    light: themeColors.red[300],
                    DEFAULT: '#f9f9f9',
                    dark: themeColors.red[500],
                    darker: themeColors.red[600],
                    darkest: themeColors.red[700],
                },
                primaryWarning: {
                    lightest: themeColors.amber[100],
                    lighter: themeColors.amber[200],
                    light: themeColors.amber[300],
                    DEFAULT: themeColors.amber[400],
                    dark: themeColors.amber[500],
                    darker: themeColors.amber[600],
                    darkest: themeColors.amber[700],
                },
                primaryPositive: {
                    lightest: themeColors.emerald[100],
                    lighter: themeColors.emerald[200],
                    light: themeColors.emerald[300],
                    DEFAULT: themeColors.emerald[400],
                    dark: themeColors.emerald[500],
                    darker: themeColors.emerald[600],
                    darkest: themeColors.emerald[700],
                }
            },
            screens: {
                'sm': '640px',
                'md': '768px',
                'lg': '1024px',
                'xl': '1280px',
                '2xl': '1536px',
            },
            container: {
                padding: {
                    DEFAULT: '1.5rem',
                    sm: '1.5rem',
                    lg: '28px',
                    xl: '48px',
                    '2xl': '72px'
                }
            },
            height: {
                '100': '28rem',
                '128': '32rem',
            },
            width: {
                '100': '28rem',
                '128': '32rem',
                '132': '38rem',
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
