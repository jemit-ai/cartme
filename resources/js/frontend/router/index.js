import { createRouter, createWebHistory } from 'vue-router'
import Home from '../pages/Home.vue'
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
                path: 'checkout',
                component: Checkout
            },
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
                path: 'shop',
                component: Shop
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
            }
        ]
    }
]



const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router