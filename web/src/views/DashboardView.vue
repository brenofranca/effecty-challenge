<script setup lang="ts">
import ChartAnnualProgress from '@/components/ChartAnnualProgress.vue'
import DateRangePicker from '@/components/DateRangePicker.vue'
import MainNav from '@/components/MainNav.vue'
import RecentOffers from '@/components/RecentOffers.vue'
import Search from '@/components/Search.vue'
import UserNav from '@/components/UserNav.vue'

import { Button } from '@/components/ui/button'
import {
  Card,
  CardContent,
  CardDescription,
  CardHeader,
  CardTitle,
} from '@/components/ui/card'
import {
  Tabs,
  TabsContent,
  TabsList,
  TabsTrigger,
} from '@/components/ui/tabs'
</script>

<template>
  <div class="hidden flex-col md:flex">
    <div class="border-b">
      <div class="flex h-16 items-center px-4">
        <MainNav class="mx-6" />
        
        <div class="ml-auto flex items-center space-x-4">
          <Search />

          <UserNav />
        </div>
      </div>
    </div>

    <div class="flex-1 space-y-4 p-8 pt-6">
      <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
        <Card>
          <CardHeader class="flex flex-row items-center justify-between space-y-0 pb-2">
            <CardTitle class="text-sm font-medium">
              Total
            </CardTitle>
          </CardHeader>
          <CardContent>
            <div class="text-4xl font-bold">
              200
            </div>
          </CardContent>
        </Card>
        <Card>
          <CardHeader class="flex flex-row items-center justify-between space-y-0 pb-2">
            <CardTitle class="text-sm font-medium">
              Pendentes
            </CardTitle>
          </CardHeader>
          <CardContent>
            <div class="text-4xl font-bold">
              40
            </div>
          </CardContent>
        </Card>
        <Card>
          <CardHeader class="flex flex-row items-center justify-between space-y-0 pb-2">
            <CardTitle class="text-sm font-medium">
              Vencedoras
            </CardTitle>
          </CardHeader>
          <CardContent>
            <div class="text-4xl font-bold">
              160
            </div>
          </CardContent>
        </Card>
        <Card>
          <CardHeader class="flex flex-row items-center justify-between space-y-0 pb-2">
            <CardTitle class="text-sm font-medium">
              Perdidas
            </CardTitle>
          </CardHeader>
          <CardContent>
            <div class="text-4xl font-bold">
              0
            </div>
          </CardContent>
        </Card>
      </div>

      <div class="flex items-center justify-between space-y-2 pt-4">
        <h2 class="text-3xl font-bold tracking-tight">
          Licitações
        </h2>
        <div class="flex items-center space-x-2">
          <DateRangePicker />
          <Button>Filtrar</Button>
        </div>
      </div>

      <Tabs default-value="overview" class="space-y-4">
        <TabsList>
          <TabsTrigger value="overview">
            Todas
          </TabsTrigger>
          <TabsTrigger value="analytics" disabled>
            Pendentes
          </TabsTrigger>
          <TabsTrigger value="reports" disabled>
            Vencedoras
          </TabsTrigger>
          <TabsTrigger value="notifications" disabled>
            Perdidas
          </TabsTrigger>
        </TabsList>
        <TabsContent value="overview" class="space-y-4">
          <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-7">
            <Card class="col-span-4">
              <CardHeader>
                <CardTitle>Comparativo</CardTitle>
                <CardDescription>progresso das licitações participadas no ano</CardDescription>
              </CardHeader>
              <CardContent class="pl-2">
                <ChartAnnualProgress />
              </CardContent>
            </Card>
            <Card class="col-span-3">
              <CardHeader>
                <CardTitle>Recentes</CardTitle>
                <CardDescription>
                  Você possui 100 Licitações no mês atual
                </CardDescription>
              </CardHeader>
              <CardContent>
                <RecentOffers />
              </CardContent>
            </Card>
          </div>
        </TabsContent>
      </Tabs>
    </div>
  </div>
</template>