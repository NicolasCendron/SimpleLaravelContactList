import { createContact } from '@/services/contactService'

//function to mock 3 contacts

export function mockCreate() {
  const contacts = [
    {
      name: 'Nicolas',
      phones: [
        { number: '+55 (51) 9.9999-9999', phone_type: '1' },
        { number: '+55 (51) 8.8888-8888', phone_type: '2' }
      ],
      "category": '2',
      id: 1
    },
    // {
    //   name: 'Alice',
    //   phones: [
    //     { number: '+55 (51) 7.7777-7777', phone_type: '1' },
    //     { number: '+55 (51) 6.6666-6666', phone_type: '3' }
    //   ],
    //   "category": '1',
    //   id: 2
    // },
    // {
    //   name: 'Bob',
    //   phones: [
    //     { number: '+55 (51) 5.5555-5555', phone_type: '2' }
    //   ],
    //   "category": '2',
    //   id: 3
    // }
  ];

  contacts.forEach(contact => createContact(contact));
}

