<script setup lang="ts">
import {
  Card,
  CardContent,
  CardHeader,
  CardTitle,
} from '@/components/ui/card'

const props = defineProps<{
  title: string;
  value: string
}>()
</script>

<template>
  <Card>
    <CardHeader class="flex flex-row items-center justify-between gap-y-1.5 p-4">
      <CardTitle class="text-sm font-normal">
        {{ props?.title }}
      </CardTitle>
    </CardHeader>
    <CardContent class="p-4 pt-0">
      <div class="text-2xl font-bold">
        R$ {{ props?.value }}
      </div>
    </CardContent>
  </Card>
</template>