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
            },
        },
    },
    plugins: [],
};
