import React from "react";

export interface ObjVenda {
  id: number,
  idCliente: number,
  idProduto: number,
  idFormaPgto: number
}

export interface iVenda {
  state: {
    vendas: ObjVenda[]
  }
  dispatch: React.Dispatch<{ payload: ObjVenda[]; type: string;}>
}