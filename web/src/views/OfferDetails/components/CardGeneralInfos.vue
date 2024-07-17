<script setup lang="ts">
import {
  Card,
  CardContent,
  CardHeader,
  CardTitle,
} from '@/components/ui/card'
import type { Licitation } from '@/lib/entities';

const { offer } = defineProps<{
  offer: Licitation;
}>()
</script>

<template>
  <Card>
    <CardHeader>
      <CardTitle>Informações Gerais</CardTitle>
    </CardHeader>
    <CardContent class="flex flex-col gap-2">
      <div class="flex items-center gap-1">
        <span class="text-sm text-zinc-30">Número: </span>
        <span class="text-md text-semibold">{{ offer?.number }}</span>
      </div>
      <div class="flex items-center gap-1">
        <span class="text-sm text-zinc-30">Departamento: </span>
        <span class="text-md text-semibold">{{ offer?.department }}</span>
      </div>
      <div class="flex items-center gap-1">
        <span class="text-sm text-zinc-30">Objeto: </span>
        <span class="text-md text-semibold">{{ offer?.objective }}</span>
      </div>
      <div class="flex items-center gap-1">
        <span class="text-sm text-zinc-30">Forma de aquisição: </span>
        <span class="text-md text-semibold">{{ offer?.form_acquisition }}</span>
      </div>
      <div class="flex items-center gap-1">
        <span class="text-sm text-zinc-30">Data da publicação:</span> <span
          class="text-md text-semibold">19/02/2024</span>
      </div>
      <div class="flex items-center gap-1">
        <span class="text-sm text-zinc-30">Status: </span>
        <span class="text-md text-semibold">{{ offer?.status }}</span>
      </div>
    </CardContent>
  </Card>
</template>