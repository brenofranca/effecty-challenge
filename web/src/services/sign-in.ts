import { httpClient } from "./api";

type SignInDataRequest = {
  email: string;
  password: string
}

type SignInDataResponse = {
  token: string;
  user: {
    id: string;
    name: string
    email: string;
  }
}

export async function signIn({ email, password }: SignInDataRequest) {
  const response = await httpClient.post('/login', { email, password })

  return response.data as SignInDataResponse
}

export async function signOut() {
  return await httpClient.post('/logout')
}