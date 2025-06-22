
export const CategoryType = Object.freeze({
  PERSONAL: 1,
  PROFESSIONAL: 2,
  FAMILY: 3,
  OTHER: 4,
})

const contactCategoryLabels = {
  [CategoryType.PERSONAL]: 'Personal',
  [CategoryType.PROFESSIONAL]: 'Professional',
  [CategoryType.FAMILY]: 'Family',
  [CategoryType.OTHER]: 'Other',
}

export function formatContactCategory(typeId) {
  return contactCategoryLabels[typeId] ?? 'Unknown'
}


export class ContactCategory {
  constructor(id) {
    this.id = id;
  }
  toString() {
    return this.name;
  }
  getId() {
    return this.id;
  }
  getName() {
    return formatContactCategory(this.id);
  }
}


