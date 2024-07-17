<script setup lang="ts">
import { Separator } from '@/components/ui/separator'
import type { Participant } from '@/lib/entities';

const props = defineProps<{ 
  participants?: Participant[]
}>()
</script>

<template>
  <div class="space-y-6">
    <template v-for="(participant, index) in props?.participants" :key="participant?.cnpj">
      <Separator v-if="index > 0" />

      <div class="flex items-center">
        <div class="mr-2 space-y-1 flex-1">
          <p class="text-sm leading-none">
            <span class="text-black">{{ participant?.name }}</span>
          </p>
          <p class="text-sm text-muted-foreground">
            {{ participant?.email }}
          </p>
          <p class="text-sm text-muted-foreground">
            Valor lançado: <span class="font-bold text-black">R$ {{ participant?.value_posted }}</span>
          </p>
        </div>
      </div>
    </template>
  </div>
</template>
