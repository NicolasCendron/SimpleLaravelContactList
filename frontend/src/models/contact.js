// src/models/Contact.js
import { ContactCategory } from './contactCategory'
import { PhoneType } from './phoneType'
function processPhones(phones) {
    if (!Array.isArray(phones) || !phones.length) {
        return []
    }
  return phones.map((phone) =>    { return {
    phoneType: new PhoneType( phone.phone_type),
    number: phone.number
  };
});
}

export class Contact {
  constructor({ id, name, category, phones }) {
    this.id = id
    this.name = name
    this.category = new ContactCategory(category)
    this.phones = processPhones(phones) // array of { phone_type, number }
  }
}