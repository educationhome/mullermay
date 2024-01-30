import peerDepsExternal from "rollup-plugin-peer-deps-external";
import resolve from "@rollup/plugin-node-resolve";
import commonjs from "@rollup/plugin-commonjs";
import postcss from "rollup-plugin-postcss";
import autoprefixer from "autoprefixer";
import cssnano from "cssnano";
import del from "rollup-plugin-delete";
import glsl from "rollup-plugin-glsl";
import { uglify }  from "rollup-plugin-uglify";



const isProd = process.env.NODE_ENV === "production";

export default {
    input: "src/js/app.js",
    output: {
        dir: "dist",
        format: "esm",
        entryFileNames: "[name].js",
        chunkFileNames: "[name].js",
    },
    treeshake: isProd,
    preserveEntrySignatures: false,
    plugins: [
        del({
            targets: "dist/app.*",
            verbose: true
        }),
        peerDepsExternal(),
        resolve(),
        commonjs(),
        postcss({
            extract: true,
            plugins: [
                autoprefixer(),
                cssnano(),
            ],
        }),
        glsl({
            include: "assets/shaders/**/*.glsl",

            // Undefined by default
            exclude: ["node_modules"],

            // Source maps are on by default
            sourceMap: false
        }),
        isProd && uglify({
            compress: {
                drop_console: false,
                drop_debugger: true,
                pure_funcs: [
                    "console.log",
                ],
            },
            mangle: {
                reserved: [
                    "console.log",
                    "window.history",
                ],
                properties: false,
            },
        }),
    ],
};