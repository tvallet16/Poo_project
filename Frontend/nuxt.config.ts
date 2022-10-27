// https://v3.nuxtjs.org/api/configuration/nuxt.config
export default defineNuxtConfig({
    css: ['vuetify/lib/styles/main.sass', '@mdi/font/css/materialdesignicons.min.css'],
    ssr: false,
    plugins: ['@/plugins/grid_layout'],
    build: {
        transpile: [
            'vuetify',
            //'grid_layout',
            '/echarts/',
        ],

    },
    vite: {
        define: {
            'process.env.DEBUG': false,
        },
    },
})
