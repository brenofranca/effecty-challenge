<script setup lang="ts">
import {
  Avatar,
  AvatarFallback,
  AvatarImage,
} from '@/components/ui/avatar'
import { Button } from '@/components/ui/button'
import {
  DropdownMenu,
  DropdownMenuContent,
  DropdownMenuGroup,
  DropdownMenuItem,
  DropdownMenuLabel,
  DropdownMenuSeparator,
  DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu'
import { clearStorage } from '@/services/local-storage';
import { signOut } from '@/services/sign-in';
import { useRouter } from 'vue-router';
import { useToast } from '@/components/ui/toast/use-toast'
import { useAuth } from '@/lib/use-auth';

const router = useRouter()
const { user } = useAuth()
const { toast } = useToast()

const handleLogout = async () => {
  try {
    await signOut();

    clearStorage();

    router.replace('/')
  } catch (error) {
    console.log('error', error)

    toast({
      variant: 'destructive',
      description: 'Não foi possível realizar o logout.',
    });
  }
}

</script>

<template>
  <DropdownMenu>
    <DropdownMenuTrigger as-child>
      <Button variant="ghost" class="relative h-8 w-8 rounded-full">
        <Avatar class="h-8 w-8">
          <AvatarImage src="/avatars/01.png" alt="@shadcn" />
          <AvatarFallback class="uppercase">{{ user?.name?.substring(0, 2) }}</AvatarFallback>
        </Avatar>
      </Button>
    </DropdownMenuTrigger>
    <DropdownMenuContent class="w-56" align="end">
      <DropdownMenuLabel class="font-normal flex">
        <div class="flex flex-col space-y-1">
          <p class="text-sm font-medium leading-none">
            {{ user?.name }}
          </p>
          <p class="text-xs leading-none text-muted-foreground">
            {{ user?.email }}
          </p>
        </div>
      </DropdownMenuLabel>
      <DropdownMenuSeparator />
      <DropdownMenuGroup>
        <DropdownMenuItem>
          Perfil
        </DropdownMenuItem>
        <DropdownMenuItem>
          Configurações
        </DropdownMenuItem>
        <DropdownMenuItem>Nova licitação</DropdownMenuItem>
      </DropdownMenuGroup>
      <DropdownMenuSeparator />
      <DropdownMenuItem @click="handleLogout()">
        Sair
      </DropdownMenuItem>
    </DropdownMenuContent>
  </DropdownMenu>
</template>
