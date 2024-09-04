const defaultTheme = require("tailwindcss/defaultTheme");
const forms = require("@tailwindcss/forms");
const typography = require("@tailwindcss/typography");
const daisyui = require("daisyui");

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: "class",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./vendor/robsontenorio/mary/src/View/Components/**/*.php",
        "./vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php",
    ],
    theme: {
        screens: {
            xs: "320px",
            sm: "480px",
            md: "768px",
            lg: "976px",
            xl: "1440px",
        },
        extend: {
            animation: {
                // adjust speed according to your need
                marquee: "marquee 40s linear infinite",
            },
            keyframes: {
                marquee: {
                    "0%": { transform: "translateX(100%)" },
                    "100%": { transform: "translateX(-200%)" },
                },
            },

            keyframes: {
                roll: {
                    "0%": { transform: "rotateX(45deg) rotateY(-45deg)" },
                    "25%": { transform: "rotateX(-45deg) rotateY(-45deg)" },
                    "50%": { transform: "rotateX(45deg) rotateY(45deg)" },
                    "75%": { transform: "rotateX(-45deg) rotateY(45deg)" },
                    "100%": { transform: "rotateX(45deg) rotateY(-45deg)" },
                },
            },
            animation: {
                roll: "roll 5s infinite",
            },
        },
    },
    variants: {
        extend: {
            animation: ["hover", "focus"],
        },
    },
    plugins: [forms, typography, daisyui],
};
