<script setup lang="ts">
import { LineChart } from '@/components/ui/chart-line'

const random = () => Math.floor(Math.random() * 2000)

const categories = ['Marquardt LLC', 'Hauck, Huels and Nicolas', 'Smitham, Kuphal and Kautzer', 'Ryan Group', 'Frami PLC']

const items = [
  {
    'date': '01/07',
    'Marquardt LLC': random(),
    'Hauck, Huels and Nicolas': 0,
    'Smitham, Kuphal and Kautzer': 0,
    'Ryan Group': 0,
    'Frami PLC': 0,
  },
  {
    'date': '02/07',
    'Marquardt LLC': 0,
    'Hauck, Huels and Nicolas': random(),
    'Smitham, Kuphal and Kautzer': 0,
    'Ryan Group': 0,
    'Frami PLC': 0,
  },
  {
    'date': '03/07',
    'Marquardt LLC': 0,
    'Hauck, Huels and Nicolas': 0,
    'Smitham, Kuphal and Kautzer': 0,
    'Ryan Group': 0,
    'Frami PLC': random(),
  },
  {
    'date': '04/07',
    'Marquardt LLC': 0,
    'Hauck, Huels and Nicolas': 0,
    'Smitham, Kuphal and Kautzer': random(),
    'Ryan Group': random(),
    'Frami PLC': 0,
  },
  {
    'date': '05/07',
    'Marquardt LLC': 0,
    'Hauck, Huels and Nicolas': 0,
    'Smitham, Kuphal and Kautzer': 0,
    'Ryan Group': 0,
    'Frami PLC': 0,
  },
  {
    'date': '06/07',
    'Marquardt LLC': random(),
    'Hauck, Huels and Nicolas': random(),
    'Smitham, Kuphal and Kautzer': random(),
    'Ryan Group': random(),
    'Frami PLC': random(),
  },
  {
    'date': '07/07',
    'Marquardt LLC': 0,
    'Hauck, Huels and Nicolas': 0,
    'Smitham, Kuphal and Kautzer': 0,
    'Ryan Group': 0,
    'Frami PLC': 0,
  },
  {
    'date': '08/07',
    'Marquardt LLC': 0,
    'Hauck, Huels and Nicolas': 0,
    'Smitham, Kuphal and Kautzer': 0,
    'Ryan Group': 0,
    'Frami PLC': 0,
  }
]
</script>

<template>
  <LineChart
    :data="items"
    index="date"
    :categories="categories"
    :y-formatter="(tick, i) => {
      return tick.toString()
    }"
  />
</template>