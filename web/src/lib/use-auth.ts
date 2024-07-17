import { getStorage } from '@/services/local-storage';
import { computed } from 'vue'

export interface User {
  id: string;
  name: string;
  email: string;
}

function useAuth() {
  return {
    user: computed(() => getStorage('@effecty:user')).value as User,
  }
}

export { useAuth }