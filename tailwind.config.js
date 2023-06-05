/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.ts",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                "franklin-gothic": ["Franklin Gothic", "sans-serif"],
                "century-gothic": ["Century Gothic", "sans-serif"],
            },
            backgroundImage: {
                default: "url('/images/bg-default.webp')",
                panel: "url('/images/bg-panel.webp')",
            },
            colors: {
                sidebar: "#F71616",
                "sidebar-alt": "#D60707",
                "panel-chart": "#070726",
                "panel-title": "#DB282E",
                "panel-type": "#D91111",
            },
        },
    },
    plugins: [require("@tailwindcss/forms")],
};
