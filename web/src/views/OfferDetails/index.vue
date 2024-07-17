<script setup lang="ts">
import MainNav from '@/components/MainNav.vue'
import Search from '@/components/Search.vue'
import UserNav from '@/components/UserNav.vue'
import ChartProgressValue from './components/ChartProgressValue.vue';
import {
  Card,
  CardContent,
  CardDescription,
  CardHeader,
  CardTitle,
} from '@/components/ui/card'
import { useRoute } from 'vue-router';
import { getOffer } from '@/services/offer';
import { useQuery } from '@tanstack/vue-query';
import ParticipanLicitationsList from '@/components/ParticipanLicitationsList.vue';
import CardQuantitative from './components/CardQuantitative.vue';
import CardGeneralInfos from './components/CardGeneralInfos.vue';

const route = useRoute()

const { data } = useQuery({
  retry: false,
  queryFn: () => getOffer(route?.params?.id as string),
  queryKey: ['offer_recents', route?.params?.id],
  refetchOnWindowFocus: false,
})

const participant_winner = data?.value?.status === 'Finalizada' ? data?.value?.participants[0] : null

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

    <div class="flex  flex-col flex-1 space-y-4 p-8 pt-6">
      <div class="mt-5 flex gap-4">
        <div class="flex gap-4">
          <div class="flex flex-col gap-4">
            <CardQuantitative
              title="Maior Valor"
              value="1.124.439"
            />

            <CardQuantitative
              title="Menor Valor"
              value="4.124,43"
            />
          </div>
          <div class="flex flex-col gap-4">
            <CardQuantitative
              title="Lance Sugerido"
              value="3.320,10"
            />

            <CardQuantitative
              title="Lance Ofertado"
              value="2.320,10"
            />
          </div>
        </div>

        <CardGeneralInfos
          v-if="data"
          :offer="data"
        />

        <Card v-if="participant_winner">
          <CardHeader>
            <CardTitle>Vencedor</CardTitle>
          </CardHeader>
          <CardContent class="flex flex-col gap-2">
            <div class="flex items-center gap-1">
              <span class="text-sm text-zinc-30">Nome: </span>
              <span class="text-md text-semibold">{{ participant_winner?.name }}</span>
            </div>
            <div class="flex items-center gap-1">
              <span class="text-sm text-zinc-30">CNPJ: </span>
              <span class="text-md text-semibold">{{ participant_winner?.cnpj }}</span>
            </div>
            <div class="flex items-center gap-1">
              <span class="text-sm text-zinc-30">Telefone: </span>
              <span class="text-md text-semibold">{{ participant_winner?.phone }}</span>
            </div>
            <div class="flex items-center gap-1">
              <span class="text-sm text-zinc-30">Forma de aquisição: </span>
              <span class="text-md text-semibold">{{ participant_winner?.date_posted }}</span>
            </div>
            <div class="flex items-center gap-1">
              <span class="text-sm text-zinc-30">Status: </span>
              <span class="text-md text-semibold">{{ data?.status }}</span>
            </div>
          </CardContent>
        </Card>
      </div>

      <div class="flex gap-5">
        <Card class="flex-1">
          <CardHeader>
            <CardTitle>Progresso</CardTitle>
            <CardDescription>
              Acompanhe o progresso dos lances da licitação
            </CardDescription>
          </CardHeader>
          <CardContent>
            <ChartProgressValue :participants="data?.participants" />
          </CardContent>
        </Card>

        <Card>
          <CardHeader>
            <CardTitle>Participantes</CardTitle>
            <CardDescription>Lista de empresas participantes da licitação</CardDescription>
          </CardHeader>
          <CardContent>
            <ParticipanLicitationsList :participants="data?.participants" />
          </CardContent>
        </Card>
      </div>
    </div>
  </div>
</template>