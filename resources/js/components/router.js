import VueRouter from "vue-router";
import Foo from "./Foo";

const router = new VueRouter({
    routes: [
        {
            path: '/foo',
            name: 'Foo',
            component: Foo
        }
    ]
})
