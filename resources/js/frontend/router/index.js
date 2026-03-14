import { createRouter, createWebHistory } from 'vue-router'
import Home from '../pages/Home.vue'
import Cart from '../pages/Cart.vue'
import Product from '../pages/Product.vue'
import Checkout from '../pages/Checkout.vue'
import ProductDetails from '../pages/ProductDetails.vue'
import Login from '../pages/Login.vue'
import Register from '../pages/Register.vue'
import ForgotPassword from '../pages/ForgotPassword.vue'
import OtpVerify from '../pages/OtpVerify.vue'
import ResetPassword from '../pages/ResetPassword.vue'

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
                path: 'product',
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
            {
                path: 'register',
                component: Register
            },
            {
                path: 'login',
                component: Login
            },
            {
                path: 'forgot-password',
                component: ForgotPassword
            },
            {
                path: 'otp-verify',
                component: OtpVerify,
                beforeEnter: (to, from, next) => {

                    console.log("Bele"+to.query.type);

                    if(to.query.type=='reset-password'){

                        if (!sessionStorage.getItem('register_email')) {
                            next('/forgot-password');
                        } else {
                            next();
                        }

                    }else{

                        next('/forgot-password');
                    }

                    if(to.query.type=='register'){

                        if (!sessionStorage.getItem('register_email')) {
                            next('/register');
                        } else {
                            next();
                        }

                    }else{
                        next('/register');
                    }
                    
                },
            },
            {
                path: 'reset-password',
                component: ResetPassword,
                beforeEnter: (to, from, next) => {
                    if (!sessionStorage.getItem('register_email')) {
                        next('/forgot-password');
                    } else {
                        next();
                    }
                },
            },  
        ]
    }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router