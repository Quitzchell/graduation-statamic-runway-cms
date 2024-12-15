import typography from '@tailwindcss/typography';
import animate from 'tailwindcss-animate';

const extendedSizes = {};
const generateSizeValue = (size: number) => {
    return `${size / 4}rem`;
};

for (let i = 1; i <= 300; i++) {
    extendedSizes[i] = generateSizeValue(i);
}

export default {
    content: [
        './resources/**/*.antlers.html',
        './resources/**/*.antlers.php',
        './resources/**/*.blade.php',
        './resources/**/*.vue',
        './content/**/*.md',
    ],

    theme: {
        width: extendedSizes,
        height: extendedSizes,
        spacing: extendedSizes,
        margin: extendedSizes,
        padding: extendedSizes,
        maxHeight: extendedSizes,
        extend: {},
    },

    plugins: [animate, typography],

};
