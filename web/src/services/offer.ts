import type { Licitation } from "@/lib/entities"
import { httpClient } from "./api"

export async function getOffer(id: string) {
  const response = await httpClient.get(`/licitation/${id}`)

  const data = response?.data as Licitation

  for (const item of data.participants) {
    item.date_posted = item.date_posted.substring(0, 10)
  }

  return data
}

export async function getOfferRecents() {
  const response = await httpClient.get('/licitation/recents', { params: { take: 3 } })

  return response?.data?.licitations as Licitation[]
}