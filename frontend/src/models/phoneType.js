

export const PhoneEnum = Object.freeze({
  MOBILE: 1,
  LANDLINE: 2,
  OTHER: 3,
})

const phoneTypeLabels = {
  [PhoneEnum.MOBILE]: 'Mobile',
  [PhoneEnum.LANDLINE]: 'Landline',
  [PhoneEnum.OTHER]: 'Other',
}

export function formatPhoneType(typeId) {
  return phoneTypeLabels[typeId] ?? 'Unknown'
}
export class PhoneType {
  constructor(id) {
    this.id = id;
  }
  getId() {
    return this.id;
  }
  getName() {
    return formatPhoneType(this.id);
  }
}