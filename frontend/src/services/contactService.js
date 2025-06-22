import { Contact } from '../models/contact'
import api from './api'

export const getContact = (id) => api.get(`/contacts/${id}`)
export const createContact = (data) => api.post('/contacts', data).then((res => {
    if(res.data.error){
        alert(res.data.error)
    }
    else alert('Contact created successfully!')

}));

export async function getContacts() {
  const { data } = await api.get('/contacts')
  return data.map(c => new Contact(c))
}