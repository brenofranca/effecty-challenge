<script setup lang="ts">
import { Button } from '@/components/ui/button'
import {
  Card,
  CardContent,
  CardDescription,
  CardFooter,
  CardHeader,
  CardTitle,
} from '@/components/ui/card'
import { Input } from '@/components/ui/input'
import { toTypedSchema } from '@vee-validate/zod'
import * as z from 'zod'
import { useForm } from 'vee-validate';
import { FormControl, FormField, FormItem, FormLabel, FormMessage } from '@/components/ui/form';
import { signIn } from '@/services/sign-in'
import { setStorage } from '@/services/local-storage'
import { useRouter } from 'vue-router'
import { useToast } from '@/components/ui/toast'

const router = useRouter()
const { toast } = useToast()

const formSchema = toTypedSchema(z.object({
  email: z.string({ required_error: 'Campo obrigatório' }).email({ message: 'Email inválido' }),
  password: z.string({ required_error: 'Campo obrigatório' }),
}))

const form = useForm({
  validationSchema: formSchema,
})

const onSubmit = form.handleSubmit(async ({ email, password }) => {
  try {
    const { token, user } = await signIn({ email, password });

    setStorage('@effecty:user', user);
    setStorage('@effecty:token', token);

    router.push('/dashboard')
  } catch (error) {
    toast({
      variant: 'destructive',
      description: 'Não foi possível realizar o login.',
    });
  }
})

</script>

<template>
  <div class="w-screen h-screen flex items-center justify-center">
    <form @submit="onSubmit" novalidate>
      <Card class="max-w-md">
        <CardHeader class="space-y-1">
          <CardTitle class="text-2xl">
            Sign In
          </CardTitle>
          <CardDescription>
            Enter your email and password below to access your account
          </CardDescription>
        </CardHeader>
        <CardContent class="grid gap-4">
          <FormField v-slot="{ componentField }" name="email">
            <FormItem>
              <FormLabel>Email</FormLabel>

              <FormControl>
                <Input type="email" v-bind="componentField" />
              </FormControl>

              <FormMessage />
            </FormItem>
          </FormField>

          <FormField v-slot="{ componentField }" name="password">
            <FormItem>
              <FormLabel>Senha</FormLabel>

              <FormControl>
                <Input type="password" v-bind="componentField" />
              </FormControl>

              <FormMessage />
            </FormItem>
          </FormField>
        </CardContent>
        <CardFooter class="flex flex-col">
          <Button type="submit" class="w-full" :disabled="form.isSubmitting.value">
            <template v-if="form.isSubmitting.value">Submitting ...</template>
            <template v-else>Sign in</template>
          </Button>
        </CardFooter>
      </Card>
    </form>
  </div>
</template>