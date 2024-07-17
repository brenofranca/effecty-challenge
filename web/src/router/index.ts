import { createRouter, createWebHistory } from 'vue-router'
import SignInVue from '@/views/auth/SignInVue.vue'
import { getStorage } from '@/services/local-storage'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'Login',
      component: SignInVue
    },
    {
      path: '/dashboard',
      name: 'Dashboard',
      component: () => import('../views/DashboardView.vue')
    },
    {
      path: '/offer/:id',
      name: 'Offer',
      component: () => import('../views/OfferDetails/index.vue')
    }
  ]
})

router.beforeEach(async (to) => {
  const token = getStorage('@effecty:token');

  if (!token && to.name !== 'Login') {
    return { name: 'Login' }
  }
})

export default router
