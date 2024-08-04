/** @type {import('tailwindcss').Config} */
const plugin = require("tailwindcss/plugin");

export default {
    darkMode: "class",
    content: [
        "./resources/**/*.js",
        "./src/**/*.{html,js}",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                webPrimary: {
                    DEFAULT: "#debe73",
                    light: "#debe73",
                    dark: "#debe73",
                },
                webSecondary: {
                    DEFAULT: "#392818",
                    light: "#392818",
                    dark: "#392818",
                },
                primary: {
                    DEFAULT: "#debe73",
                    light: "#debe73",
                    dark: "#debe73",
                },
                secondary: {
                    DEFAULT: "#392818",
                    light: "#392818",
                    dark: "#392818",
                },
                border: {
                    light: "#bdc3c7",
                    dark: "#2c3e50",
                },
                bg: {
                    light: "#ecf0f1",
                    dark: "#34495e",
                },
                darkbg: {
                    primary: "#040d19",
                    secondary: "#071426",
                },
                facebook: { DEFAULT: "#1877F2" },
                instagram: { DEFAULT: "#E1306C" },
                youtube: { DEFAULT: "#FF0000" },
                whatsapp: { DEFAULT: "#25D366" },
                twitter: { DEFAULT: "#1DA1F2" },
                discord: { DEFAULT: "#7289DA" },
            },
            backgroundImage: {
                logo: "url('/public/images/logo.png')",
                headerBG: "url('/public/images/headerBG.png')",
                headerBG1: "url('/public/images/headerBG1.png')",
                headerBG2: "url('/public/images/headerBG2.png')",
                headerBG3: "url('/public/images/headerBG3.png')",
                navBG: "url('/public/images/navBG.png')",
                footerBG: "url('/public/images/footerBG.png')",
                titleBG: "url('/public/images/titleBG.png')",
                menuBG: "url('/public/images/menuBG.png')",
                borderBG: "url('/public/images/borderBG.png')",
                loginBG: "url('/public/images/loginBG.png')",
                loginBG1: "url('/public/images/loginBG1.png')",
                bodyBG: "url('/public/images/bodyBG.png')",
                titleLeft: "url('/public/images/titleLeft.png')",
                titleRight: "url('/public/images/titleRight.png')",
                staticBG: "url('/public/images/staticBG.png')",
            },
            textShadow: {
                sm: "0px 0px 0px var(--tw-shadow-color)",
                DEFAULT: "0px 1px 0px var(--tw-shadow-color)",
                lg: "0px 3px 5px var(--tw-shadow-color)",
            },
        },
    },
    plugins: [
        plugin(function ({ matchUtilities, theme }) {
            matchUtilities(
                {
                    "text-shadow": (value) => ({
                        textShadow: value,
                    }),
                },
                { values: theme("textShadow") }
            );
        }),
    ],
};
