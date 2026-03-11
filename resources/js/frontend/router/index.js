import { createRouter, createWebHistory } from 'vue-router'
import Home from '../pages/Home.vue'
import Cart from '../pages/Cart.vue'
import Product from '../pages/Product.vue'
import Checkout from '../pages/Checkout.vue'
import ProductDetails from '../pages/ProductDetails.vue'

import MainLayout from '../layouts/MainLayout.vue'

const routes = [
    {
        path: '/',
        component: MainLayout,
        children: [
            {
                path: '',
                component: Home
            },
            {
                path: 'cart',
                component: Cart
            },
            {
                path: 'products',
                component: Product
            },
            {
                path: 'product/:id',
                component: ProductDetails
            },
            {
                path: 'checkout',
                component: Checkout
            },


            /*
            {
                path: 'product/:id',
                component: Product
            },
            {
                path: 'profile',
                component: Profile
            },
            {
                path: 'wishlist',
                component: Wishlist
            },
            {
                path: 'login',
                component: Login
            },
            {
                path: 'register',
                component: Register
            },
            {
                path: 'search',
                component: Search
            },
            {
                path: 'products',
                component: Products
            },
            {
                path: 'contact',
                component: Contact
            },
            {
                path: 'about',
                component: About
            },
            {
                path: 'privacy',
                component: Privacy
            },
            {
                path: 'terms',
                component: Terms
            },
            {
                path: 'return-policy',
                component: ReturnPolicy
            },
            {
                path: 'shipping-policy',
                component: ShippingPolicy
            },
            {
                path: 'refund-policy',
                component: RefundPolicy
            }*/
        ]
    }
]



const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router