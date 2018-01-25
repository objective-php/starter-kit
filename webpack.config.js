const path = require('path');

const dev = process.env.NODE_ENV === "development";

const ExtractTextPlugin = require("extract-text-webpack-plugin");
const extractSass = new ExtractTextPlugin({
    filename: "style.css",
    disable: dev
});

let cssLoaders = [
    {
        loader: 'css-loader',
        options: {
            importLoaders: 1,
            sourceMap: true
        }
    }
];

if (!dev) {
    cssLoaders.push({
        loader: 'postcss-loader',
        options: {
            plugins: (loader) => [
            require('autoprefixer')({
                browsers: ['last 2 versions', 'ie > 8']
            })
        ],
        sourceMap: true
    }
});
}

cssLoaders.push({
    loader: 'sass-loader',
    options: {
        sourceMap: true
    }
});

module.exports = {
    entry: [
        './app/theme/scss/theme.scss',
        './app/theme/script/theme.js',
    ],
    output: {
        path: path.resolve(__dirname, 'public/'),
        filename: "theme.js"
    },
    module: {
        rules: [
            {
                test: /\.js/,
                exclude: /(node_modules)/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['env']
                    }
                }
            },
            {
                test: /\.scss$/,
                use: extractSass.extract({
                    use: cssLoaders,
                    fallback: "style-loader"
                })
            }
        ]
    },
    plugins: [
        extractSass
    ]
};