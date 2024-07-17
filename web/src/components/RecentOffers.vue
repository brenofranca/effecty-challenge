<script setup lang="ts">
import {
  Avatar,
  AvatarFallback,
  AvatarImage,
} from '@/components/ui/avatar'
import { Button } from '@/components/ui/button'
import { Separator } from '@/components/ui/separator'
import { useRouter } from 'vue-router';

const router = useRouter()

import { useQuery } from '@tanstack/vue-query'
import { getOfferRecents } from '@/services/offer';

const { data } = useQuery({
  queryFn: getOfferRecents,
  queryKey: ['offer_recents'],
  refetchOnWindowFocus: false,
})

const handleOfferDetails = (offer: any) => {
  router.push({ path: `/offer/${offer.id}` })
}
</script>

<template>
  <div class="space-y-6">
    <template v-for="(offer, index) in data" :key="offer?.id">
      <Separator v-if="index > 0" />

      <div class="flex items-center">
        <Avatar class="h-9 w-9">
          <AvatarImage src="/avatars/01.png" alt="Avatar" />
          <AvatarFallback class="uppercase">{{ offer?.department?.slice(0, 2) }}</AvatarFallback>
        </Avatar>

        <div class="ml-4 mr-2 space-y-1 flex-1">
          <p class="text-sm font-medium leading-none">
            {{ offer?.department }}
          </p>
          <p class="text-sm text-muted-foreground">
            {{ offer?.objective }}
          </p>
          <div class="ml-auto font-medium">
            {{ offer?.status }}
          </div>
        </div>

        <Button variant="secondary" size="sm" @click="handleOfferDetails(offer)">
          Visualizar
        </Button>
      </div>

    </template>
  </div>
</template>
