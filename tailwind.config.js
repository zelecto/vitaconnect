/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter", "sans-serif"],
                serif: ["Lora", "serif"],
            },
            transitionDuration: {
                500: "500ms",
            },
        },
    },
    plugins: [],
};
