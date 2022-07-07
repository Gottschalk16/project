import React from "react"

export interface ObjCliente {
  id: number,
  nome: string,
  endereco: string,
  email: string,
  cep: string
}

export interface iCliente {
  state: {
    clientes: ObjCliente[]
  }
  dispatch: React.Dispatch<{ payload: ObjCliente[]; type: string;}>
}
