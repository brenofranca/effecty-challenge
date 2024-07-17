import axios, { type AxiosResponse, type InternalAxiosRequestConfig } from "axios";
import { getStorage } from "./local-storage";

const httpClient = axios.create({
  baseURL: import.meta.env.API_URL ?? 'http://127.0.0.1:8000/api',
  headers: {
    Accept: "application/json"
  },
})

const onRequest = (config: InternalAxiosRequestConfig) => {
  const token = getStorage('@effecty:token')

  if (token) {
    config.headers.Authorization = `Bearer ${token}`
  }

  return config;
}

const onResponseSuccess = (response: AxiosResponse) => {
  return response;
};

const onResponseError = (error: any) => {
  return Promise.reject(error);
};

httpClient.interceptors.request.use(onRequest);

httpClient.interceptors.response.use(onResponseSuccess, onResponseError);

export { httpClient }