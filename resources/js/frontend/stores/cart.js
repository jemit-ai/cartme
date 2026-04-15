import { defineStore } from 'pinia'
import api from '../services/api'

export const useCartStore = defineStore('cart', {

    state: () => ({
        items: [], 
        subTotal: 0,
        mainTotal: 0,
        loading: false,
        error: null
    }),

    getters: {
        totalItems: (state) => state.items.length,
        // If items were objects with quantity:
        // totalItems: (state) => state.items.reduce((total, item) => total + item.quantity, 0),
    },

    actions: {

        async addToCart(productId, quantity = 1) {
            this.loading = true
            this.error = null
            try {
                const response = await api.post('/cart/add', {
                    product_id: productId,
                    quantity: quantity
                })
                
                // Fetch updated cart to keep state in sync
                await this.fetchCart()
                
                return response.data
            } catch (error) {
                this.error = error.response?.data?.message || 'Failed to add item to cart'
                console.error('Error adding to cart:', error)
                throw error
            } finally {
                this.loading = false
            }
        },

        async fetchCart() {
            this.loading = true
            try {

                const response = await api.get('/cart') 
                //console.log('Cart#:', response.data.data)
                this.items    = response.data.data.items
                this.subTotal = response.data.data.sub_total
                this.mainTotal    = response.data.data.main_total
                //console.log('CartTotal#:', this.subTotal)

            } catch (error) {
                console.error('Error fetching cart:', error)
            } finally {
                this.loading = false
            }
        },

        async removeItem(id, quantity) {
            this.loading = true
            this.error = null
            try { 
                
                const response = await api.post('/cart/remove', {
                    product_id: id,
                    quantity: quantity
                })

                this.items = this.items.filter(item => item.id !== id)
                
                console.log('Remove from Cart Response:', response.data)
                // Fetch updated cart to keep state in sync
                await this.fetchCart()
                return response.data

            } catch (error) {
                this.error = error.response?.data?.message || 'Failed to remove item from cart'
                console.error('Error removing from cart:', error)
                throw error
            } finally {
                this.loading = false
            }
        }


    },
    persist: true
})
