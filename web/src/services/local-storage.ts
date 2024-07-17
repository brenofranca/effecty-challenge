export function clearStorage() {
  window.localStorage.clear()
}

export function setStorage(key: string, value?: any) {
  if (!value) {
    window.localStorage.removeItem(key);
    
    return
  }

  window.localStorage.setItem(key, JSON.stringify(value));
}

export function getStorage(key: string) {
  try {
    const value = window.localStorage.getItem(key);

    return value ? JSON.parse(value) : null
  } catch (error) {
    console.log('Erro to get key:value in storage', key)

    return null
  }
}