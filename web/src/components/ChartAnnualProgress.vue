<script setup lang="ts">
import { BarChart } from '@/components/ui/chart-bar'

const data = [
  { name: 'Jan', total: Math.floor(Math.random() * 100) + 10 },
  { name: 'Fev', total: Math.floor(Math.random() * 100) + 10 },
  { name: 'Mar', total: Math.floor(Math.random() * 100) + 10 },
  { name: 'Abr', total: Math.floor(Math.random() * 100) + 10 },
  { name: 'Mai', total: Math.floor(Math.random() * 100) + 10 },
  { name: 'Jun', total: Math.floor(Math.random() * 100) + 10 },
  { name: 'Jul', total: Math.floor(Math.random() * 100) + 10 },
]
</script>

<template>
  <BarChart :data="data" :categories="['total']" :index="'name'" :rounded-corners="4" />
</template>
