export interface User {
  id: string;
  name: string;
  email: string;
}

export type Participant = {
  name: string
  cnpj: string
  type: string
  email: string
  phone: string
  value_posted: number
  date_posted: string
}

export type Licitation = {
  id: number
  number: string
  department: string
  status: string
  objective: string
  form_acquisition: string
  date_published: string
  responsible: {
    name: string
    email: string
    phone: string
  }
  documents: Array<{
    file_name: string
    file_url: string
  }>
  participants: Array<Participant>
  result?: {
    value_estimated: number
    value_contracted: number
    value_economized: number
  }
  participant_winner_id: string
}
