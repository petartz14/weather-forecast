import route from "ziggy-js";

export default {
    install: (app, options) => {
        // prettier-ignore
        app.mixin({
            methods: {
                route: (name, params, absolute, config = options) => route(name, params, absolute, config),
            },
        });
    },
};
