const path = require('path');

module.exports = {
    entry: {
        app: './resources/ts/app.tsx'
    },
    output: {
        path: __dirname + '/public',
        filename: 'dist/[name].js'
    },
    resolve: {
        extensions: ['.ts', '.tsx', '.js']
    },
    module: {
        rules: [
            {test: /\.tsx?$/, loader: 'ts-loader'}
        ]
    }
}
